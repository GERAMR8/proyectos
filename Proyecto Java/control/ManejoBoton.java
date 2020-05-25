/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import java.time.LocalDate;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.control.CheckBox;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.ListView;
import javafx.scene.control.RadioButton;
import javafx.scene.control.TextField;
import javax.swing.JOptionPane;
import javax.swing.JTextField;
import modelo.AccesoDatos;

/**
 *
 * @author ILA
 */
public class ManejoBoton implements EventHandler<ActionEvent>{
    
    String genero,tecnologias="";
    TextField nombre;
    DatePicker fecha;
    RadioButton masc,feme;
    CheckBox java,dot;
    ListView<String> areas;
    ChoiceBox localidad;
    public ManejoBoton(TextField n, DatePicker f,RadioButton mas,RadioButton fem,CheckBox java,CheckBox dot,ListView<String> a,ChoiceBox l){
        this.nombre=n;
        this.fecha=f;
        this.masc=mas;
        this.feme=fem;
        this.java=java;
        this.dot=dot;
        this.areas=a;
        this.localidad=l;
        
    }
    
     @Override
    public void handle(ActionEvent event) {
        
        String nom=nombre.getText();
        
        LocalDate date = fecha.getValue();
        String fec=""+date;
        
        if(masc.isSelected()){
            genero="Masculino";
        }else
            if(feme.isSelected()){
                genero="Femenino";
            }
        if(java.isSelected()){
            tecnologias+="Java ";
        }
        if(dot.isSelected()){
              tecnologias+="DotNet ";  
            }
        
        String res=""+areas.getSelectionModel().getSelectedItem();
      
        String local=""+localidad.getValue();
                
        AccesoDatos ad = new AccesoDatos();
        if(ad.conexion()){
          JOptionPane.showMessageDialog(null,(ad.insercion(nom,fec,genero,tecnologias,res,local)));
                }else{
                    JOptionPane.showMessageDialog(null,"No se realizo la conexion");
                }
        tecnologias="";
        
    }
    
}
