package swep.WorkFlows;
import fr.inria.peerunit.remote.GlobalVariables;
import java.rmi.RemoteException;
import java.util.LinkedList;
import swep.ApplicationImporter;
import swep.Beans.Data;
import swep.Beans.DataDistribution;
import swep.Beans.LeechLogger;
import swep.DataExporter;
import swep.SysConstants.SystemConstants;
import swep.SysMessages.SystemMessages;
import swep.Beans.WorkFlow;
import swep.ExecutionPlanGenerated;
/**
 * This class is inherited by WorkFLows
 * @see WorkflowMultVet
 * @see WorkflowSumVet
 * @author Diogo Cezar Teixeira Batista
 * @version 0.0.2
 * @since aug-2011
 */
public abstract class Implementation {
    /**
     * Object that will distribut data in a basic model
     */
    private DataDistribution dataDistribution;
    /**
     * Object that represents a workflow that will be executed.
     */
    private WorkFlow workFlow;
    /**
     * Default constructor.
     * @param idWorkFlow Id of workflow
     */
    public Implementation(int idWorkFlow){
        this.setWorkFlow(new WorkFlow());
        this.populate(idWorkFlow);
    }
    /**
     * Method that popule workflow with definitions in XML application file.
     * @param idWorkflow 
     */
    private void populate(int idWorkflow){
        ApplicationImporter ai = new ApplicationImporter(SystemConstants.APPLICATION + ExecutionPlanGenerated.uniqueKey + ".xml");
        this.setWorkFlow(ai.getWorkflowById(idWorkflow));       
    }
    /**
     * Method used to debug system. Prints a matrix.
     * @param matrix Matrix to print.
     */
    public static void print(int[][] matrix){
        int limit = matrix.length;
        for(int i=0; i<limit; i++){
            for(int j=0; j<limit; j++){
                System.out.print(matrix[i][j] + " ");
            }
            System.out.println();
        }
        System.out.println();
        System.out.println();
    }
    /**
     * Abstract method that will be implemented on heirs.
     */
    abstract void populateData();
    /**
     * Method that broadcast result of a workflow execution.
     * @param globals Global variable of PeerUnit.
     * @param hostId Id of host that is executing broadcast.
     * @param listFileName List of files that will be saved informations.
     * @param leechLogger Object to control log.
     * @param IdWorkFlow The id of workflow that will be executed.
     */
    public static void broadcastData(GlobalVariables globals, int hostId, LinkedList<Data> listFileName, LeechLogger leechLogger, int IdWorkFlow){
        try{
            leechLogger.startTask(hostId, "broadcastData");
            Object obj = Implementation.getValueGlobal(globals, hostId);
            String logFiles = "";
            if(obj instanceof LinkedList){
                LinkedList<Object> listObjects = (LinkedList<Object>) obj;
                for(int i=0; i<listObjects.size(); i++){
                    if(listObjects.get(i) instanceof int[][]){
                            int[][] matrix = new int[5][5];
                            matrix = (int[][]) listObjects.get(i);
                            DataExporter de = new DataExporter();
                            Data data       = new Data(matrix, listFileName.get(i).getFileName());
                            de.exportData(data);
                            logFiles += listFileName.get(i).getFileName() +  ";";
                    }
                }
                leechLogger.endTask(hostId, "broadcastData_" + logFiles);
            }
            else{
                leechLogger.endTask(hostId, SystemMessages.EMSG_EXPORTING_DATA);
            }
        }
        catch(Exception ex){
        }
    }
    /**
     * Method that broadcast result of a workflow execution in a simple parallel model.
     * @param globals Global variable of PeerUnit.
     * @param leechLogger Object to control log.
     * @param listFileName List of files that will be saved informations.
     */
    public static void broadcastDataParallel(GlobalVariables globals, LeechLogger leechLogger, LinkedList<Data> listFileName){
        try{
            leechLogger.startTask(0, "broadcastData");
            Object obj = Implementation.getValueGlobal(globals, 0);
            String logFiles = "";
            if(obj instanceof LinkedList){
                LinkedList<Object> listObjects = (LinkedList<Object>) obj;
                for(int i=0; i<listObjects.size(); i++){
                    if(listObjects.get(i) instanceof int[][]){
                        int[][] matrix = new int[5][5];
                        matrix = (int[][]) listObjects.get(i);
                        DataExporter de = new DataExporter();
                        Data data       = new Data(matrix, listFileName.get(i).getFileName());
                        de.exportData(data);
                        logFiles += listFileName.get(i).getFileName() +  ";";
                    }
                }
                leechLogger.endTask(0, "broadcastData_" + logFiles);
            }
            else{
                leechLogger.endTask(0, SystemMessages.EMSG_EXPORTING_DATA);
            }
        }
        catch(Exception ex){
        }
    }
    /**
     * Method that insert a variable in globals.
     * @param globals Global variable of PeerUnit.
     * @param hostId Id of host.
     * @param objectPut Object to save.
     */
    public static void insertValueGlobal (GlobalVariables globals, int hostId, Object objectPut){
        try {
            globals.put(hostId, objectPut);
        } catch (RemoteException ex) {
            System.out.println(SystemMessages.EMSG_PUT_GLOBAL + ex.getMessage());
        }
    }
    /**
     * Method that return a variable in globals.
     * @param globals Global variable of PeerUnit.
     * @param hostId Id of host.
     * @return Object to return.
     */
    public static Object getValueGlobal (GlobalVariables globals, int hostId){
        try{
            return globals.get(hostId);
        } catch (RemoteException ex) {
            System.out.println(SystemMessages.EMSG_GET_GLOBAL + ex.getMessage());
            return null;
        }
    }
    /**
     * Method that distribute automatically the data in simple parallel model.
     * @param hostId
     */
    protected void distribute(int hostId){
        if(this.getWorkFlow().getChunk() == -1){
            this.distributeByHosts(hostId);
        }
        else{
            this.distributeByChunk(hostId);
        }
    }
    /**
     * Method that distribut data by chunk size in basic parallel model.
     * @param hostId Id of host.
     */
    protected void distributeByChunk(int hostId){
        this.getDataDistribution().distributeByChunk(hostId, this.getWorkFlow());
    }
    /**
     * Method that distribut data by number of hosts in basic parallel model.
     * @param hostId
     */
    protected void distributeByHosts(int hostId){
        this.getDataDistribution().distributeByHosts(hostId, this.getWorkFlow());
    }
    /**
     * @return the dataDistribution
     */
    public DataDistribution getDataDistribution() {
        return dataDistribution;
    }
    /**
     * @param dataDistribution the dataDistribution to set
     */
    protected void setDataDistribution(DataDistribution dataDistribution) {
        this.dataDistribution = dataDistribution;
    }
    /**
     * @return the workFlow
     */
    public WorkFlow getWorkFlow() {
        return workFlow;
    }
    /**
     * @param workFlow the workFlow to set
     */
    private void setWorkFlow(WorkFlow workFlow) {
        this.workFlow = workFlow;
    }
}