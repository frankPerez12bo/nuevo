package CPractica;

public class CPractica02 {
    
    static CPractica01 obj = new CPractica01();
    static leer num = new leer();
    
    
    public static void main(String[] args) {
        
        float compra;
        int  monto;
        
        compra = num.leerCompra();
        obj.setCompra(compra);
        monto = num.leerMonto();
        obj.setMonto(monto); 
        obj.hallarDescuento(monto, compra);
        
        imprimir(compra, monto);
    }

    private static class leer {

        public leer() {
        
        }
    }
}
        