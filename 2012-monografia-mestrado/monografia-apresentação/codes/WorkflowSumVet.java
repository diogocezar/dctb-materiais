package swep.WorkFlows;
import fr.inria.peerunit.remote.GlobalVariables;
import java.util.LinkedList;
import swep.Beans.Data;
import swep.Beans.LeechLogger;
import swep.DataImporter;
import swep.SysMessages.SystemMessages;
/**
 * This class implements an operator that sum vectors.
 * @see Implementation
 * @see WorkflowMultVet
 * @author Diogo Cezar Teixeira Batista
 * @version 0.0.2
 * @since aug-2011
 */
public class WorkflowSumVet extends Implementation {
    /**
     * Source matrix a.
     */
    private int[][] matrix_a;
    /**
     * Source matrix b.
     */
    private int[][] matrix_b;
    /**
     * Result matrix c.
     */
    private int[][] matrix_c;
    /**
     * List of results that will be saved.
     */
    private LinkedList<Object> listObjects;
    /**
     * Default constructor.
     * @param idWorkFlow Id of workflow.
     */
    public WorkflowSumVet(int idWorkFlow){
        super(idWorkFlow);
        int size = 5;
        this.setMatrix_a(new int[size][size]);
        this.setMatrix_b(new int[size][size]);
        this.setMatrix_c(new int[size][size]);
        this.setListObjects(new LinkedList<Object>());
        this.populateData();
    }
    /**
     * Method that reset the matrix of results.
     */
    private void resetMatrix(){
        int limit = getMatrix_c().length;
        for(int i=0; i<limit; i++){
            for(int j=0; j<limit; j++){
                getMatrix_c()[i][j] = 0;
            }
        }
    }
    /**
     * Method used to debug system. Prints a matrix.
     * @param matrix Matrix to print.
     */
    private void printMatrix(int[][] matrix){
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
     * Method that saves a result in a list of results.
     * @param globals Global variable of PeerUnit.
     * @param hostId Id of host will save information.
     */
    private void save(GlobalVariables globals, int hostId){
        Implementation.insertValueGlobal(globals, hostId, getListObjects());
    }
    /**
     * Method that sum a sequential matrix.
     * @param globals Global variable of PeerUnit.
     * @param hostId Id of host will process matrix.
     * @param leechLogger Leech logger to record this action.
     */
    public void sumVet_sequential(GlobalVariables globals, int hostId, LeechLogger leechLogger){
        try{
            leechLogger.startTask(hostId, "sumVet_sequential");
            int limit = getMatrix_a().length;
            this.resetMatrix();
            for(int i=0; i<limit; i++){
                for(int j=0; j<limit; j++){
                    getMatrix_c()[i][j] = getMatrix_a()[i][j]+getMatrix_b()[i][j];
                }
            }
            
            this.getListObjects().add(getMatrix_c());
            this.save(globals, hostId);
            leechLogger.endTask(hostId, "sumVet_sequential");
        }
        catch(Exception ex){
            System.out.println(SystemMessages.EMSG_EXECUTE_TASK + ex.getMessage());
        }
    }
    /**
     * Method that broadcast the result for all other hosts.
     * @param globals Global variable of PeerUnit.
     * @param hostId Id of host will broadcast information.
     * @param leechLogger Leech logger to record this action.
     * @param idWorkFlow  Id of workflow that will be executed.
     */
    public void broadcastData(GlobalVariables globals, int hostId, LeechLogger leechLogger, int idWorkFlow){
        Implementation.broadcastData(globals, hostId, this.getWorkFlow().getListDataOutput(), leechLogger, idWorkFlow);
    }
    /**
     * Method that broadcast parallel the result for all other hosts.
     * @param globals Global variable of PeerUnit.
     * @param leechLogger Leech logger to record this action.
     */
    public void broadcastDataParallel(GlobalVariables globals, LeechLogger leechLogger){
        Implementation.broadcastDataParallel(globals, leechLogger, this.getWorkFlow().getListDataOutput());
    }
    /**
     * Method that execute a simple parallel model.
     * @param globals Global variable of PeerUnit.
     * @param hostId Id of host will process matrix.
     * @param leechLogger Leech logger to record this action.
     */
    public void sumVet_parallel(GlobalVariables globals, int hostId, LeechLogger leechLogger){
        leechLogger.startTask(hostId, "sumVet_parallel");
        super.distribute(hostId);
        
        int limit = getMatrix_a().length;
        int start_data = this.getDataDistribution().getStartData();
        int end_data   = this.getDataDistribution().getEndData();
        this.resetMatrix();
        for(int i=start_data; i<end_data; i++){
            for(int j=0; j<limit; j++){
                getMatrix_c()[i][j] = getMatrix_a()[i][j]+getMatrix_b()[i][j];
            }
        }
        this.getListObjects().add(getMatrix_c());
        this.save(globals, hostId);
        leechLogger.endTask(hostId, "sumVet_parallel");
    }
    /**
     * Method that join results of a simple parallel model.
     * @param globals Global variable of PeerUnit.
     */
    public void joinResult(GlobalVariables globals){
        int numHosts = this.getWorkFlow().getHosts();
        this.resetMatrix();
        for(int i=0; i<numHosts; i++){
            Object obj = Implementation.getValueGlobal(globals, i);
            if(obj instanceof LinkedList){
                LinkedList<Object> listObjectsByHost = (LinkedList<Object>) obj;
                for(int j=0; j<listObjectsByHost.size(); j++){
                    if(listObjectsByHost.get(j) instanceof int[][]){
                        int[][] matrix = new int[5][5];
                        matrix = (int[][]) listObjectsByHost.get(j);
                        for(int k=0; k<matrix.length; k++){
                            for(int l=0; l<matrix.length; l++){
                                if(matrix[k][l] != 0){
                                    getMatrix_c()[k][l] = matrix[k][l];
                                }
                            }
                        }
                    }
                }
            }
        }
        this.getListObjects().add(getMatrix_c());
        this.save(globals, 0);
    }
    /**
     * Method that populate sources matrix with content in xml files. 
     */
    final void populateData() {
        String input_matrix_a = this.getWorkFlow().getListDataInput().get(0).getFileName();
        String input_matrix_b = this.getWorkFlow().getListDataInput().get(1).getFileName();
        Data data_matrix_a = new Data(this.getMatrix_a(), input_matrix_a);
        Data data_matrix_b = new Data(this.getMatrix_b(), input_matrix_b);
        DataImporter di_matrix_a = new DataImporter();
        DataImporter di_matrix_b = new DataImporter();
        di_matrix_a.importData(data_matrix_a);
        di_matrix_b.importData(data_matrix_b);
        this.setMatrix_a(di_matrix_a.getData().getDataInt());
        this.setMatrix_b(di_matrix_b.getData().getDataInt());
    }
    /**
     * @return the matrix_a
     */
    public int[][] getMatrix_a() {
        return matrix_a;
    }
    /**
     * @param matrix_a the matrix_a to set
     */
    private void setMatrix_a(int[][] matrix_a) {
        this.matrix_a = matrix_a;
    }
    /**
     * @return the matrix_b
     */
    public int[][] getMatrix_b() {
        return matrix_b;
    }
    /**
     * @param matrix_b the matrix_b to set
     */
    private void setMatrix_b(int[][] matrix_b) {
        this.matrix_b = matrix_b;
    }
    /**
     * @return the matrix_c
     */
    public int[][] getMatrix_c() {
        return matrix_c;
    }
    /**
     * @param matrix_c the matrix_c to set
     */
    private void setMatrix_c(int[][] matrix_c) {
        this.matrix_c = matrix_c;
    }
    /**
     * @return the listObjects
     */
    public LinkedList<Object> getListObjects() {
        return listObjects;
    }
    /**
     * @param listObjects the listObjects to set
     */
    private void setListObjects(LinkedList<Object> listObjects) {
        this.listObjects = listObjects;
    }
}