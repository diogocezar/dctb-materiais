package swep;
import swep.Beans.WorkFlow;
import swep.SysMessages.SystemMessages;
import swep.Beans.Action;
import java.io.FileWriter;
import java.io.IOException;
import java.util.LinkedList;
import swep.Beans.Data;
import swep.Beans.Host;
import swep.Beans.Task;
import swep.SysConstants.SystemConstants;
import swep.SysLogger.SystemLogger;
/**
 * Class responsible to translate application to planner and planner to application.
 * @author Diogo Cezar Teixeira Batista
 * @version 0.0.2
 * @since aug-2011
 */
public class TranslationBox {
    /**
     * Application importer.
     */
    private ApplicationImporter applicationImporter;
    /**
     * Path of problem file.
     */
    private String problemFileOut;
    /**
     * Path of domain file.
     */
    private String domainFileOut;
    /**
     * List of inputs.
     */
    private LinkedList<Integer> numInputs;
    /**
     * List of outputs.
     */
    private LinkedList<Integer> numOutputs;
    /**
     * Application file.
     */
    private String applicationFile;
    /**
     * Default constructor.
     */
    public TranslationBox(String uniqueKey){
        this.setApplicationFile(SystemConstants.APPLICATION + uniqueKey + ".xml");
        this.setProblemFileOut(SystemConstants.PROBLEMS + uniqueKey + ".pddl");
        this.setDomainFileOut (SystemConstants.DOMAINS  + uniqueKey + ".pddl");
        this.saveToFile(this.translateProblem(), this.getProblemFileOut());
        this.saveToFile(this.translateDomain(),  this.getDomainFileOut());
        SystemLogger.addInfo("Calling the Planner.");
        // calling the planner
        MakePlan mp = new MakePlan(this.getProblemFileOut(), this.getDomainFileOut(), uniqueKey);
    }
    /**
     * Method that return a header of domain file.
     * @return String with header of domain file.
     */
    private String getHeaderDomain(){
        String toReturn = "";
        toReturn += "(define (domain matrix)";
        toReturn += "\n";
        toReturn += "(:requirements :typing :fluents)";
        toReturn += "\n\n";
        toReturn += "\t(:types data task hosts - object)";
        toReturn += "\n\n";
        toReturn += "\t(:predicates";
        toReturn += "\n";
        toReturn += "\t\t(have ?d - data)";
        toReturn += "\n";
        toReturn += "\t\t(availiable ?h - hosts)";
        toReturn += "\n";
        toReturn += "\t\t(half-availiable ?h - hosts)";
        toReturn += "\n";
        toReturn += "\t\t(working-full ?h - hosts ?t - task)";
        toReturn += "\n";
        toReturn += "\t\t(working-half ?h - hosts ?t - task)";
        toReturn += "\n";
        return toReturn;
    }
    /**
     * Method that makes a String with int passed by parameter.
     * @param numData Number of datas to put at String.
     * @return String with a list of datas.
     */
    private String makeParameterData(int numData){
        String toReturn = "";
        for(int i=1; i<=numData; i++){
            toReturn += " ?i" + i + " - data";
        }
        return toReturn;
    }
    /**
     * Method that makes a String with int passed by parameter.
     * @param numData Number of haves to put at String.
     * @return String with a list of haves.
     */
    private String makePrecondictionHave(int numData){
        String toReturn = "";
        for(int i=1; i<=numData; i++){
            toReturn += " (have ?i" + i + ")";
        }
        return toReturn;
    }
    /**
     * Method that make a precondiction by type.
     * @param numData Number os entries.
     * @param type input or output.
     * @return String with precondiction.
     */
    private String makePrecondiction(int numData, String type){
        String toReturn = "";
        toReturn += " (" + type + numData;
        for(int i=1; i<=numData; i++){
            toReturn += " ?i" + i;
        }
        toReturn += " ?t)";
        return toReturn;
    }
    /**
     * Method that returns the actions-start to domain.
     * @return String with actions-start.
     */
    private String getActionsStartTask(){
        String toReturn = "";
        for(int i=0; i<this.getNumInputs().size(); i++){
            int numInput = this.getNumInputs().get(i);
            toReturn += "\t(:action start-task-full" + numInput;
            toReturn += "\n";
            toReturn += "\t:parameters (?h - hosts ?t - task" + this.makeParameterData(numInput) +")";
            toReturn += "\n";
	    toReturn += "\t:precondition (and (availiable ?h)" + this.makePrecondictionHave(numInput) + this.makePrecondiction(numInput, "input") + ")";
            toReturn += "\n";
	    toReturn += "\t:effect (and (working-half ?h ?t) (not (availiable ?h)) (increase (total-cost) 1))";
            toReturn += "\n";
            toReturn += "\t)";
            toReturn += "\n";
            toReturn += "\n";
            toReturn += "\t(:action start-task-half" + numInput;
            toReturn += "\n";
            toReturn += "\t:parameters (?h - hosts ?t - task" + this.makeParameterData(numInput) +")";
            toReturn += "\n";
	    toReturn += "\t:precondition (and (half-availiable ?h)" + this.makePrecondictionHave(numInput) + this.makePrecondiction(numInput, "input") + ")";
            toReturn += "\n";
	    toReturn += "\t:effect (and (working-full ?h ?t) (not (half-availiable ?h)) (increase (total-cost) 10))";
            toReturn += "\n";
            toReturn += "\t)";
            toReturn += "\n";
        }
        return toReturn;
    }
    /**
     * Method that returns the actions-end to domain.
     * @return String with actions-end.
     */
    private String getActionsEndTask(){
        String toReturn = "";
        for(int i=0; i<this.getNumOutputs().size(); i++){
            int numOutput = this.getNumOutputs().get(i);
            toReturn += "\t(:action end-task-full" + numOutput;
            toReturn += "\n";
            toReturn += "\t:parameters (?h - hosts ?t - task" + this.makeParameterData(numOutput) + ")"; 
            toReturn += "\n";
	    toReturn += "\t:precondition (and (working-half ?h ?t)" + this.makePrecondiction(numOutput, "output") + ")";
            toReturn += "\n";
	    toReturn += "\t:effect (and (availiable ?h)" + this.makePrecondictionHave(numOutput) + " (not (half-availiable ?h)) (not (working-half ?h ?t)))";
            toReturn += "\n";
            toReturn += "\t)";
            toReturn += "\n";
            toReturn += "\n";
            toReturn += "\t(:action end-task-half" + numOutput;
            toReturn += "\n";
            toReturn += "\t:parameters (?h - hosts ?t - task" + this.makeParameterData(numOutput) + ")"; 
            toReturn += "\n";
	    toReturn += "\t:precondition (and (working-full ?h ?t)" + this.makePrecondiction(numOutput, "output") + ")";
            toReturn += "\n";
	    toReturn += "\t:effect (and (half-availiable ?h)" + this.makePrecondictionHave(numOutput) + " (not (working-full ?h ?t)))";
            toReturn += "\n";
            toReturn += "\t)";
            toReturn += "\n";
        }
        return toReturn;
    }
    /**
     * Method that return predicate of input.
     * @return String with predicate of input.
     */
    private String getPredicateInput(){
        String toReturn = "";
        int index=1;
        int numInput=0;
        this.setApplicationImporter(new ApplicationImporter(this.getApplicationFile()));
        this.setNumInputs(new LinkedList<Integer>());
        LinkedList<WorkFlow> listWorkFlow = this.getApplicationImporter().getListWorkFlow();
        for(int i=0; i<listWorkFlow.size(); i++){
            WorkFlow wf = listWorkFlow.get(i);
            if(numInput != wf.getListDataInput().size()){
                if(!toReturn.equals("")){
                    toReturn += "?t - task)\n";
                }
                index=1;
                numInput = wf.getListDataInput().size();
                this.getNumInputs().add(numInput);
                toReturn += "\t\t(input" + numInput + " ";
                for(int j=0; j<numInput; j++){
                    toReturn += "?d" + (index++) +" - data ";
                }
            }
        }
        toReturn += "?t - task)";
        return toReturn;
    }
    /**
     * Method that return predicate of output.
     * @return String with predicate of output.
     */
    private String getPredicateOutput(){
        String toReturn = "";
        int index=1;
        int numOutput=0;
        this.setApplicationImporter(new ApplicationImporter(this.getApplicationFile()));
        this.setNumOutputs(new LinkedList<Integer>());
        LinkedList<WorkFlow> listWorkFlow = this.getApplicationImporter().getListWorkFlow();
        for(int i=0; i<listWorkFlow.size(); i++){
            WorkFlow wf = listWorkFlow.get(i);
            if(numOutput != wf.getListDataOutput().size()){
                if(!toReturn.equals("")){
                    toReturn += "?t - task)\n";
                }
                index=1;
                numOutput = wf.getListDataOutput().size();
                this.getNumOutputs().add(numOutput);
                toReturn += "\t\t(output" + numOutput + " ";
                for(int j=0; j<numOutput; j++){
                    toReturn += "?d" + (index++) + " - data ";
                }
            }
        }
        toReturn += "?t - task)";
        return toReturn;
    }
    /**
     * Method that return a header of a problem file.
     * @return String with a header of a problem file.
     */
    private String getHeaderProblem(){
        String toReturn = "";
        toReturn += "(define (problem problem_matrix)";
        toReturn += "\n";
        toReturn += "(:domain matrix)";
        toReturn += "\n\n";
        toReturn += "\t(:objects";
        toReturn += "\n";
        return toReturn;
    }
    /**
     * Method that return all data.
     * @return String with all data.
     */
    private String getData(){
        String toReturn = "\t\t";
        this.setApplicationImporter(new ApplicationImporter(this.getApplicationFile()));
        LinkedList<Data> listDataInput = this.getApplicationImporter().getListDataInput();
        LinkedList<Data> listDataOutput = this.getApplicationImporter().getListDataOutput();
        for(int i=0; i<listDataInput.size(); i++){
            toReturn += listDataInput.get(i).getFileNameWithoutXMLAndPath() + " ";
        }
        for(int i=0; i<listDataOutput.size(); i++){
            if(!toReturn.contains(listDataOutput.get(i).getFileNameWithoutXMLAndPath())){
                toReturn += listDataOutput.get(i).getFileNameWithoutXMLAndPath() + " ";
            }
        }
        toReturn += "- data";
        return toReturn;
    }
    /**
     * Method that return what data application have.
     * @return String with what data application have.
     */
    private String getHaveData(){
        String toReturn = "";
        this.setApplicationImporter(new ApplicationImporter(this.getApplicationFile()));
        LinkedList<String> listData     = new LinkedList<String>();
        LinkedList<Data> listDataInput  = this.getApplicationImporter().getListDataInput();
        LinkedList<Data> listDataOutput = this.getApplicationImporter().getListDataOutput();
        for(int i=0;i<listDataInput.size();i++){
            listData.add(listDataInput.get(i).getFileNameWithoutXMLAndPath());
        }
        for(int i=0;i<listDataOutput.size();i++){
            if(listData.contains(listDataOutput.get(i).getFileNameWithoutXMLAndPath())){
                listData.remove(listDataOutput.get(i).getFileNameWithoutXMLAndPath());
            }
        }
        for(int i=0;i<listData.size();i++){
            toReturn += "\t\t(have " + listData.get(i) +  ")\n";
        }
        return toReturn;
    }
    /**
     * Method that gets what data is input.
     * @return String with input data.
     */
    private String getInputs(){
        String toReturn = "";
        this.setApplicationImporter(new ApplicationImporter(this.getApplicationFile()));
        LinkedList<WorkFlow> listWorkFlow = this.getApplicationImporter().getListWorkFlow();
        for(int i=0; i<listWorkFlow.size(); i++){
            WorkFlow wf = listWorkFlow.get(i);
            int numInput = wf.getListDataInput().size();
            toReturn += "\t\t(input" + numInput + " ";
            for(int j=0; j<wf.getListDataInput().size(); j++){
                toReturn += wf.getListDataInput().get(j).getFileNameWithoutXMLAndPath() + " ";
            }
            toReturn += wf.getName() + ")\n";
        }
        return toReturn;
    }
    /**
     * Method that gets what data is output.
     * @return String with input output.
     */
    private String getOutputs(){
        String toReturn = "";
        this.setApplicationImporter(new ApplicationImporter(this.getApplicationFile()));
        LinkedList<WorkFlow> listWorkFlow = this.getApplicationImporter().getListWorkFlow();
        for(int i=0; i<listWorkFlow.size(); i++){
            WorkFlow wf = listWorkFlow.get(i);
            int numInput = wf.getListDataOutput().size();
            toReturn += "\t\t(output" + numInput + " ";
            for(int j=0; j<wf.getListDataOutput().size(); j++){
                toReturn += wf.getListDataOutput().get(j).getFileNameWithoutXMLAndPath() + " ";
            }
            toReturn += wf.getName() + ")\n";
        }
        return toReturn;
    }
    /**
     * Method that return a list of tasks.
     * @return List of tasks.
     */
    private String getTasks(){
        String toReturn = "\t\t";
        LinkedList<Task> listTasks = this.getApplicationImporter().getListTasks();
        for(int i=0; i<listTasks.size(); i++){
            toReturn += listTasks.get(i).getNameWithoutXML() + " ";
        }
        toReturn += "- task";
        return toReturn;
    }
    /**
     * Method that return a list of all hosts in system.
     * @return List of all hosts.
     */
    private String getHosts(){
        String toReturn = "\t\t";
        LinkedList<Host> listOfHosts = this.getListHosts();
        for(int i=0; i<listOfHosts.size(); i++){
            toReturn += listOfHosts.get(i).getName() +  " ";
        }
        toReturn += "- hosts";
        return toReturn;
    }
    /**
     * Method that return hosts avaliable or half-avaliable.
     * @return String with hosts avaliable or half-avaliable.
     */
    private String getInitHosts(){
        String toReturn = "\t\t";
        LinkedList<Host> listOfHosts = this.getListHosts();
        for(int i=0; i<listOfHosts.size(); i++){
            toReturn += "(" + listOfHosts.get(i).getStatus() + " " + listOfHosts.get(i).getName() + ")\n\t\t";
        }
        return toReturn;
    }
    /**
     * Method that return the goal of plan.
     * @return String with the goal of plan.
     */
    private String getGoal(){
        String toReturn = "";
        this.setApplicationImporter(new ApplicationImporter(this.getApplicationFile()));
        LinkedList<Data> listGoals = this.getApplicationImporter().getListGoals();
        if(listGoals.size() > 1){
            toReturn += "\t\t(and\n";
            for(int i=0; i<listGoals.size(); i++){
                toReturn += "\t\t\t(have " + listGoals.get(i).getFileNameWithoutXMLAndPath() + ")\n";
            }
            toReturn += "\n\t\t)";
        }
        else{
            toReturn += "\t\t(have " + listGoals.get(0).getFileNameWithoutXMLAndPath() + ")\n";
        }
        return toReturn;
    }
    /**
     * Method that return a list of hosts getted in OracleMetaData.
     * @return List of Hosts.
     */
    private LinkedList<Host> getListHosts(){
        return new OracleMetaData().getListOfHosts();
    }
    /**
     * Method that translate actions to XML file
     * @param actions 
     */
    public void translateActions(LinkedList<Action> actions){

    }
    /**
     * Method that generate a problem file with system propriets.
     * @return String with problem file with system propriets.
     */
    private String translateProblem(){
        String toReturn;
        toReturn  = "";
        toReturn += this.getHeaderProblem();
        toReturn += this.getData();
        toReturn += "\n";
        toReturn += this.getTasks();
        toReturn += "\n";
        toReturn += this.getHosts();
        toReturn += "\n";
        toReturn += "\t)";
        toReturn += "\n\n";
        toReturn += "\t(:init";
        toReturn += "\n";
        toReturn += this.getHaveData();
        toReturn += "\n";
        toReturn += this.getInputs();
        toReturn += "\n";
        toReturn += this.getOutputs();
        toReturn += "\n";
        toReturn += this.getInitHosts();
        toReturn += "\n";
        toReturn += "\t\t(= (total-cost) 0)";
        toReturn += "\n";
        toReturn += "\t)";
        toReturn += "\n\n";
        toReturn += "\t(:goal";
        toReturn += "\n";
        toReturn += this.getGoal();
        toReturn += "\n";
        toReturn += "\t)";
        toReturn += "\n\n";
        toReturn += "\t(:metric minimize (total-cost))";
        toReturn += "\n";
        toReturn += ")";
        return toReturn;
    }
    /**
     * Method that generate a domain file with system propriets.
     * @return String with domain file with system propriets.
     */
    private String translateDomain(){
        String toReturn;
        toReturn  = "";
        toReturn += this.getHeaderDomain();
        toReturn += this.getPredicateInput();
        toReturn += "\n";
        toReturn += this.getPredicateOutput();
        toReturn += "\n";
        toReturn += "\t)";
        toReturn += "\n\n";
        toReturn += "\t(:functions";
        toReturn += "\n";
        toReturn += "\t\t(total-cost)";
        toReturn += "\n";
        toReturn += "\t)";
        toReturn += "\n";
        toReturn += "\n";
        toReturn += this.getActionsStartTask();
        toReturn += "\n";
        toReturn += this.getActionsEndTask();
        toReturn += "\n";
        toReturn += ")";
        return toReturn;
    }
    /**
     * Method that save a problem to a file.
     * @param list List that will be saved like a file.
     */
    private void saveToFile(String content, String fileName){
        try {
            FileWriter x = new FileWriter(fileName, false);
            x.write(content);
            x.close();
        } catch (IOException ex) {
            System.out.println(SystemMessages.EXMSG_WRITE_FILE + ex.getMessage());
        }   
    }
    /**
     * @return the problemFileOut
     */
    private String getProblemFileOut() {
        return problemFileOut;
    }
    /**
     * @param problemFileOut the problemFileOut to set
     */
    private void setProblemFileOut(String problemFileOut) {
        this.problemFileOut = problemFileOut;
    }
    /**
     * @return the applicationImporter
     */
    public ApplicationImporter getApplicationImporter() {
        return applicationImporter;
    }
    /**
     * @param applicationImporter the applicationImporter to set
     */
    private void setApplicationImporter(ApplicationImporter applicationImporter) {
        this.applicationImporter = applicationImporter;
    }
    /**
     * @return the domainFileOut
     */
    private String getDomainFileOut() {
        return domainFileOut;
    }
    /**
     * @param domainFileOut the domainFileOut to set
     */
    private void setDomainFileOut(String domainFileOut) {
        this.domainFileOut = domainFileOut;
    }
    /**
     * @return the numInputs
     */
    public LinkedList<Integer> getNumInputs() {
        return numInputs;
    }
    /**
     * @param numInputs the numInputs to set
     */
    public void setNumInputs(LinkedList<Integer> numInputs) {
        this.numInputs = numInputs;
    }
    /**
     * @return the numOutputs
     */
    public LinkedList<Integer> getNumOutputs() {
        return numOutputs;
    }
    /**
     * @param numOutputs the numOutputs to set
     */
    public void setNumOutputs(LinkedList<Integer> numOutputs) {
        this.numOutputs = numOutputs;
    }
    /**
     * @return the applicationFile
     */
    public String getApplicationFile() {
        return applicationFile;
    }
    /**
     * @param applicationFile the applicationFile to set
     */
    private void setApplicationFile(String applicationFile) {
        this.applicationFile = applicationFile;
    }
}