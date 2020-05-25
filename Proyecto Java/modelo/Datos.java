/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

/**
 *
 * @author ILA
 */
public class Datos {
    private String nombre;
    private String fecha;
    private String genero;
    private String tecnologias;
    private String areas;
    private String localidad;

    
    public Datos(String n,String f,String g,String t,String a,String l){
        this.nombre=n;
        this.fecha=f;
        this.genero=g;
        this.tecnologias=t;
        this.areas=a;
        this.localidad=l;
    }
    
    /**
     * @return the nombre
     */
    public String getNombre() {
        return nombre;
    }

    /**
     * @param nombre the nombre to set
     */
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    /**
     * @return the fecha
     */
    public String getFecha() {
        return fecha;
    }

    /**
     * @param fecha the fecha to set
     */
    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    /**
     * @return the genero
     */
    public String getGenero() {
        return genero;
    }

    /**
     * @param genero the genero to set
     */
    public void setGenero(String genero) {
        this.genero = genero;
    }

    /**
     * @return the tecnologias
     */
    public String getTecnologias() {
        return tecnologias;
    }

    /**
     * @param tecnologias the tecnologias to set
     */
    public void setTecnologias(String tecnologias) {
        this.tecnologias = tecnologias;
    }

    /**
     * @return the areas
     */
    public String getAreas() {
        return areas;
    }

    /**
     * @param areas the areas to set
     */
    public void setAreas(String areas) {
        this.areas = areas;
    }

    /**
     * @return the localidad
     */
    public String getLocalidad() {
        return localidad;
    }

    /**
     * @param localidad the localidad to set
     */
    public void setLocalidad(String localidad) {
        this.localidad = localidad;
    }
}
