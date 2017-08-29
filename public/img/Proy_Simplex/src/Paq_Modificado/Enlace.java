
package Paq_Modificado;

public class Enlace 
{
    private Object[]puntos=null;
    private int []FuncionObjetivo=null;
    public Enlace(){}

    public Object[] getPuntos() {
        return puntos;
    }
    public void setPuntos(Object[] puntos) {
        this.puntos = puntos;
    }

    /**
     * @return the FuncionObjetivo
     */
    public int [] getFuncionObjetivo() {
        return FuncionObjetivo;
    }
    public void setFuncionObjetivo(int [] FuncionObjetivo) {
        this.FuncionObjetivo = FuncionObjetivo;
    }

}
