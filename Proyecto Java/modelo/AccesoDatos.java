/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;


/**
 *
 * @author ILA
 */
public class AccesoDatos {
    
   
        Connection conn=null;
        Statement stat=null;
        ResultSet rs=null;
    
    
     public boolean conexion(){
                boolean band = false;
                
                try
                    {
                        Class.forName("org.postgresql.Driver").newInstance();
                        band = true;
                    } catch(Exception ex){
                        band = false;
                            System.out.println("Fallo driver: "+ex);
                        }
                try
                    {
                        conn=DriverManager.getConnection("jdbc:postgresql://localhost:5432/Usuario",
                                "postgres", "postgres");
                        band = true;
                    } catch (SQLException se){
                        band = false;
                            System.out.println("Mensaje: "+se.getMessage());
                            System.out.println("Estado: "+se.getSQLState());
                            System.out.println("Error: "+se.getErrorCode());
                        }
                return band;
            }
        
  public String insercion(String nombre,String fecha,String genero,String tecnologias,String areas,String localidad){
String res="";

      try{
            
      // create a mysql database connection
      String myDriver = "org.postgresql.Driver";
      String myUrl = "jdbc:postgresql://localhost:5432/Usuario";
      Class.forName(myDriver);
      Connection conn = DriverManager.getConnection(myUrl, "postgres", "postgres");
      
      Statement st = conn.createStatement();
     
      // note that i'm leaving "date_created" out of this insert statement
    int i = st.executeUpdate("INSERT INTO datos (nombre,fecha, genero,tecnologias,area,localidad) "
          +"VALUES ('"+nombre+"', '"+fecha+"', '"+genero+"', '"+tecnologias+"', '"+areas+"', '"+localidad+"')");
      if(i>0){
         res="Se insertaron correctamente los datos \n" + "Nombre: "+nombre+"\n Fecha:" + fecha ;
      }
      else{
      res="No se insertaron correctamente los datos";
      }
      conn.close();
    }
    catch (Exception e)
    {
      res+="Got an exception!";
      res+=e.getMessage();
    }
            
return res;
}
    }
    
    
    
    

