package swep;
import fr.inria.peerunit.remote.GlobalVariables;
import fr.inria.peerunit.parser.SetGlobals;
import fr.inria.peerunit.parser.TestStep;
import fr.inria.peerunit.parser.AfterClass;
import fr.inria.peerunit.parser.BeforeClass;
import fr.inria.peerunit.parser.SetId;
import java.rmi.RemoteException;
import swep.SysConstants.SystemConstants;
import swep.Beans.LeechInformation;
import swep.Beans.LeechLogger;
/**
 * Execution Plan
 * This file were generated automatically.
 */
public class ExecutionPlanGenerated {
    /**
     * globals is accessible on all peers
     */
    private GlobalVariables globals;
    /**
     * id is a variable to get a peer identification
     */
    private int id;
    /**
     * leech
     */
    private LeechLogger leechLogger;
    /**
     * Unique Key Execution
     */
    public static String uniqueKey = "03-01-2012-13:59:20";
    @SetId
    public void setId(int i) {
        id = i;
    }
    @BeforeClass(range="*")
    public void begin(){
        /**
         * Starting LeechLogger
         */
         leechLogger = new LeechLogger();
    }
    @TestStep(range = "0", order = 1, timeout = 1000)
    public void host_0_order_1_workflow_1() throws RemoteException {
        JoinWorkFlows.sumVet_sequential(globals, id, 1, leechLogger);
    }
    @TestStep(range = "1", order = 1, timeout = 1000)
    public void host_1_order_1_workflow_0() throws RemoteException {
        JoinWorkFlows.sumVet_sequential(globals, id, 0, leechLogger);
    }
    @TestStep(range = "*", order = 2, timeout = 1000)
    public void host_all_order_2_workflow_0() throws RemoteException {
        JoinWorkFlows.broadcastResults_sumVet(globals, 1, 0, leechLogger);
    }
    @TestStep(range = "*", order = 2, timeout = 1000)
    public void host_all_order_2_workflow_1() throws RemoteException {
        JoinWorkFlows.broadcastResults_sumVet(globals, 0, 1, leechLogger);
    }
    @TestStep(range = "0-1", order = 3, timeout = 1000)
    public void host_0_1_order_3_workflow_2() throws RemoteException {
        JoinWorkFlows.multVet_parallel(globals, id, 2, leechLogger);
    }
    @TestStep(range = "0-1", order = 4, timeout = 1000)
    public void host_0_1_order_4_workflow_2() throws RemoteException {
        JoinWorkFlows.broadcastResults_multVet_parallel(globals, id, 2, leechLogger);
    }
    @TestStep(range = "*", order = 5, timeout = 1000)
    public void leechInformation() throws RemoteException {
        LeechInformation li = new LeechInformation(id, leechLogger);
        String fileName = SystemConstants.METADATA + "information_h" + id + ".xml";
        li.appendToXML(fileName);
    }
    @AfterClass(range="*", timeout = 1500)
    public void end() {
    }
    @SetGlobals
    public void setGlobals(GlobalVariables gv) {
        globals = gv;
    }
}