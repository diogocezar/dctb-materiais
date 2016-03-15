package swep;
import java.io.File;
import java.util.LinkedList;
import swep.Beans.Action;
import swep.Beans.Plan;
import swep.SysConstants.SystemConstants;
import swep.SysLogger.SystemLogger;
import swep.SysMessages.SystemMessages;
/**
 * Class responsible to manage the generation and exportion in actions of plan.
 * @author Diogo Cezar Teixeira Batista
 * @version 0.0.2
 * @since aug-2011
 */
public class MakePlan {
    /**
     * Path of problem file.
     */
    private String problemFileOut;
    /**
     * Path of domain file.
     */
    private String domainFileOut;
    /**
     * The plan.
     */
    private Plan plan;
    /**
     * Default constructor.
     */
    public MakePlan(){
    }
    /**
     * Alternative constructor.
     * @param problemFileOut File of problem.
     * @param domainFileOut File of domain.
     * @param uniqueKey Unique key for each execution.
     */
    public MakePlan(String problemFileOut, String domainFileOut, String uniqueKey){
        this.setProblemFileOut(problemFileOut);
        this.setDomainFileOut (domainFileOut);
        this.setPlan(new Plan(SystemConstants.PLAN + uniqueKey + ".txt", uniqueKey));
        this.doMakePlan();
        this.getPlan().fillPlan();
        LinkedList<Action> actions = this.getPlan().getActions();
        SystemLogger.addInfo("Exporting Actions.");
        // calling export actions
        this.getPlan().exportActions(actions, uniqueKey);
    }
    private void doMakePlan(){
        try {
            if(this.checkFile(this.getDomainFileOut()) && this.checkFile(this.getProblemFileOut())){
                String command = "java -jar ./lib/CRIKEY.jar " + this.getDomainFileOut() + " " + this.getProblemFileOut() + " " + this.getPlan().getFileName();
                Runtime rt = Runtime.getRuntime();
                Process pr = rt.exec(command);
                pr.waitFor();
            }
        } catch (Exception ex) {
            System.out.println(SystemMessages.EXMSG_MAKING_PLAN + ex.getMessage());
        }
    }
    /**
     * Method that checks if a file exists
     * @param fileName Path of file.
     * @return If file exists.
     */
    private boolean checkFile(String fileName){
        boolean exists = (new File(fileName)).exists();
        if (exists){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * @return the problemFileOut
     */
    public String getProblemFileOut() {
        return problemFileOut;
    }
    /**
     * @param problemFileOut the problemFileOut to set
     */
    private void setProblemFileOut(String problemFileOut) {
        this.problemFileOut = problemFileOut;
    }
    /**
     * @return the domainFileOut
     */
    public String getDomainFileOut() {
        return domainFileOut;
    }
    /**
     * @param domainFileOut the domainFileOut to set
     */
    private void setDomainFileOut(String domainFileOut) {
        this.domainFileOut = domainFileOut;
    }
    /**
     * @return the plan
     */
    private Plan getPlan() {
        return plan;
    }
    /**
     * @param plan the plan to set
     */
    private void setPlan(Plan plan) {
        this.plan = plan;
    }
}