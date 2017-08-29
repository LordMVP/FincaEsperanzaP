@extends('pagina.template.principal')

@section('titulo', 'Modelo')

@section('js1')
<script src="{{ asset('plugin/simplex/jsimplex.js') }}">
</script>
<script type="text/javascript">
</script>
@endsection

@section('pagina', 'Modelo')

@section('contenido')
<div class="row">
   <div class="col-md-12">
      <form action="" class="elegant-aero" method="post">
         <label id="h1form">
            Problema Lineal
         </label>
         <br>
            <p>
               <b>
                  Objetivo
               </b>
               :    Maximizar
               <input checked="" id="idoptmaximizar" name="objetivo" type="radio" value="V1">
                  Minimizar:
                  <input i="idoptminimizar" name="objetivo" type="radio" value="V2"/>
               </input>
            </p>
            <label>
               Número de variables:
               <input id="idnovariables" name="txtnovariables" size="2" type="text">
               </input>
            </label>
            <label>
               Número de Restricciones:
               <input id="idnorestricciones" name="txtnorestricciones" size="2" type="text">
               </input>
            </label>
            <button class="button" onclick="preparar()" type="button" value="Preparar">
               <i class="fa fa-cog">
               </i>
               Iniciar
            </button>
         </br>
      </form>
      <br>
         <br>
            <div id="idgridproblema">
               Introduzca los coeficientes del problema:
               <br>
                  <table bordercolor="#FFFFFF">
                     <tbody>
                        <tr>
                           <td>
                           </td>
                           <td class="jcell">
                              X
                              <sub>
                                 1
                              </sub>
                           </td>
                           <td class="jcell">
                              X
                              <sub>
                                 2
                              </sub>
                           </td>
                           <td>
                           </td>
                           <td>
                           </td>
                        </tr>
                        <tr>
                           <td class="jcell">
                              Min Z =
                           </td>
                           <td>
                              <input id="txtx1" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtx'1="" type="text name="/>
                           </td>
                           <td>
                              <input id="txtx2" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtx'2="" type="text name="/>
                           </td>
                           <td>
                           </td>
                           <td>
                           </td>
                        </tr>
                        <tr>
                           <td class="jcell">
                              Restricción 1
                           </td>
                           <td>
                              <input id="txtr1x1" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtr1x1'="" type="text name="/>
                           </td>
                           <td>
                              <input id="txtr1x2" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtr1x2'="" type="text name="/>
                           </td>
                           <td>
                              <select id="cmbr1" name="cmbr1" size="1">
                                 <option '="" selected="" value="<=">
                                    <=
                                 </option>
                                 <option value=">=">
                                    >=
                                 </option>
                                 <option value="=">
                                    =
                                 </option>
                              </select>
                           </td>
                           <td>
                              <input id="txtrhs1" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtrhs1'="" type="text name="/>
                           </td>
                        </tr>
                        <tr>
                           <td class="jcell">
                              Restricción 2
                           </td>
                           <td>
                              <input id="txtr2x1" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtr2x1'="" type="text name="/>
                           </td>
                           <td>
                              <input id="txtr2x2" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtr2x2'="" type="text name="/>
                           </td>
                           <td>
                              <select id="cmbr2" name="cmbr2" size="1">
                                 <option '="" selected="" value="<=">
                                    <=
                                 </option>
                                 <option value=">=">
                                    >=
                                 </option>
                                 <option value="=">
                                    =
                                 </option>
                              </select>
                           </td>
                           <td>
                              <input id="txtrhs2" maxlength="6" onblur="jmodelo()" onkeypress="return solonumeros(event)" size="5" txtrhs2'="" type="text name="/>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </br>
            </div>
            <div id="jmodelo">
               <br>
                  <font color="#000000" face="Verdana" size="2">
                     <table>
                        <tbody>
                           <tr>
                              <td>
                                 <b>
                                    Min      Z =
                                 </b>
                              </td>
                              <td>
                                 2000
                                 <font color="#0000FF">
                                    X
                                 </font>
                                 <sub>
                                    1
                                 </sub>
                              </td>
                              <td>
                                 +500
                                 <font color="#0000FF">
                                    X
                                 </font>
                                 <sub>
                                    2
                                 </sub>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Sujeto a:
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                              <td>
                              </td>
                           </tr>
                           <tr>
                              <td>
                              </td>
                              <td>
                                 2
                                 <font color="#0000FF">
                                    X
                                 </font>
                                 <sub>
                                    1
                                 </sub>
                              </td>
                              <td>
                                 +3
                                 <font color="#0000FF">
                                    X
                                 </font>
                                 <sub>
                                    2
                                 </sub>
                              </td>
                              <td>
                                 >=
                              </td>
                              <td>
                                 36
                              </td>
                           </tr>
                           <tr>
                              <td>
                              </td>
                              <td>
                                 3
                                 <font color="#0000FF">
                                    X
                                 </font>
                                 <sub>
                                    1
                                 </sub>
                              </td>
                              <td>
                                 +6
                                 <font color="#0000FF">
                                    X
                                 </font>
                                 <sub>
                                    2
                                 </sub>
                              </td>
                              <td>
                                 >=
                              </td>
                              <td>
                                 60
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     Xi>=0
                     <br>
                        <br>
                           Mostrar Iteraciones
                           <input checked="" id="chkiteraciones" name="chkiteraciones" type="checkbox" value="ON">
                              <br>
                                 <br>
                                    <div>
                                       <button class="pure-button pure-button-primary" onclick="resolver()">
                                          <i class="fa fa-th">
                                          </i>
                                          Resolver
                                       </button>
                                    </div>
                                 </br>
                              </br>
                           </input>
                        </br>
                     </br>
                  </font>
               </br>
            </div>
            <div id="jsolucion">
               <br>
                  <br>
                     <h2>
                        Solución
                     </h2>
                     <br>
                        <font color="#0000FF">
                           X
                        </font>
                        <sub>
                           1
                        </sub>
                        = 0
                        <br>
                           <font color="#0000FF">
                              X
                           </font>
                           <sub>
                              2
                           </sub>
                           = 12
                           <br>
                              <font color="#0000FF">
                                 S
                              </font>
                              <sub>
                                 1
                              </sub>
                              = 0
                              <br>
                                 <font color="#0000FF">
                                    S
                                 </font>
                                 <sub>
                                    2
                                 </sub>
                                 = 12
                                 <br>
                                    <font color="#0000FF">
                                       A
                                    </font>
                                    <sub>
                                       1
                                    </sub>
                                    = 0
                                    <br>
                                       <font color="#0000FF">
                                          A
                                       </font>
                                       <sub>
                                          2
                                       </sub>
                                       = 0
                                       <br>
                                          <b>
                                             <font color="#0000FF">
                                                Z
                                             </font>
                                          </b>
                                          = 6000
                                       </br>
                                    </br>
                                 </br>
                              </br>
                           </br>
                        </br>
                     </br>
                  </br>
               </br>
            </div>
            <script src="http://ingenieria-industrial.net/js/jsimplex.js" type="text/javascript">
            </script>
            <script type="text/javascript">
               function preparar()
      {
          var novariables= document.getElementById("idnovariables").value;
          var norestricciones = document.getElementById("idnorestricciones").value;
          var objetivo;
          var s;
          var i,j,k;
          s="";
          
          if (novariables < 2)
          {
              alert("Se requiere como m�nimo dos variables");
              document.getElementById("idnovariables").focus();
              return 0;
          }
          
          if (norestricciones < 1)
          {
              alert("Se requiere como m�nimo una restricci�n");
              document.getElementById("idnorestricciones").focus();
              return 0;
          }
          
          if (document.getElementById("idoptmaximizar").checked == true)
          {
              objetivo=1;
          }
          else
          {
              objetivo=0;
          }    
           s=s+"Introduzca los coeficientes del problema:<br>";       
          s= s+"<table bordercolor='#FFFFFF'>";
          s= s+"<tr>";
          s= s+"<td></td>";
          for (i=1; i<=novariables; i++)
            {
                s= s+"<td class='jcell'>X<sub>"+i+"</sub></td>";
            }
          s= s+"<td></td>";
          s= s+"<td></td>";
          s= s+"</tr>"; 
          
          s= s+"<tr>"; 
          if (objetivo==1)
          {
              s= s+"<td class='jcell'>Max Z = </td>";
          }else
          {
              s= s+"<td class='jcell'>Min Z = </td>";          
          }
          for(j=1; j<=novariables; j++)
          {
              s= s+ "<td><input type='text name='txtx'" +  j + " size='5' onkeypress='return solonumeros(event)' onblur='jmodelo()' maxlength='6' id='txtx" + j + "'  ></td> ";     
          }  
          s= s+"<td></td>";
          s= s+"<td></td>";        
          s= s+"</tr>"; 
          
          for (i=1; i<=norestricciones; i++)
          {
              s= s+"<tr>";
              s= s+"<td class='jcell'> Restricci&oacute;n "+i+" </td>";
              for (j=1; j<=novariables; j++)
                {
                    s= s+"<td><input type='text name='txtr"+i+"x"+j+"' id='txtr"+i+"x"+j+"'  size='5' onkeypress='return solonumeros(event)' onblur='jmodelo()' maxlength='6'  ></td>";
                }
              s= s + "<td> <select size='1' name='cmbr"+i+"' id='cmbr"+i+"'><option selected value='<=''><=</option><option value='>='> >= </option><option value='='> = </option></select></td>";
              s= s + "<td> <input type='text name='txtrhs"+i+"' size='5' onkeypress='return solonumeros(event)' onblur='jmodelo()' maxlength='6' id='txtrhs"+i+"'  ></td>";          
              s= s+"</tr>";
          }       

          
          s= s+"</table>";
          document.getElementById("idgridproblema").innerHTML= s;          
      }
      
function jmodelo()
{
var novariables;
var norestricciones;
var objetivo;
var i; var j;
var aux;
var s;




novariables = document.getElementById("idnovariables").value;
norestricciones = document.getElementById("idnorestricciones").value; 
if (document.getElementById("idoptmaximizar").checked==true)
{
    objetivo = "Max ";
}else
{
    objetivo = "Min     ";
}    

s="<br><font face='Verdana' size='2' color='#000000'>";
s= s + "<table>";
s= s + "<tr>";
s= s + "<td><B>"+objetivo+" Z = </B></td>";

for (i=1; i<= novariables; i++)
  {
  aux = document.getElementById("txtx"+i).value;  
  if (aux!=0)
    {
    if (aux>0)
      {
      if (i==1)
        {
        s= s + "<td>"+(aux==1?"":aux)+"<font color='#0000FF'>X</font><sub>"+i+"</sub></td>";
        }
        else
        {
        s= s + "<td>+" +( aux==1?"":aux) +"<font color='#0000FF'>X</font><sub>"+i+"</sub></td>";
        }     
      }
    else
      {
      s= s + "<td>"+ aux +"<font color='#0000FF'>X</font><sub>"+i+"</sub></td>";
      }
    }
  }
  s= s +"</tr>";
        s= s +"<tr>";
        s= s +"<td>Sujeto a:</td>";
  s= s+"<td></td>";
        for (j=1; j<=novariables+2;j++)
        {
            s= s +"<td></td>";
        }        
        s= s +"</tr>";
  for (j=1; j<=norestricciones; j++)
    {
                s= s +"<tr>";
                s= s +"<td></td>";
    for (i=1; i<=novariables; i++)
      {
      aux = document.getElementById("txtr"+j+"x"+i).value;  
      if (aux!=0)
        {
        if (aux>0)
          {
            if (i==1 )
              {
                                                        if (aux !=1)
                                                            { 
                                                            s= s + "<td>"+aux + "<font color='#0000FF'>X</font><sub>"+i+"</sub></td>";
                                                            }else
                                                            {
                                                            s= s + "<td><font color='#0000FF'>X</font><sub>"+i+"</sub></td>";
                                                            }    
              }
              else
              {
                                                        if (aux!= 1)
                                                            {
                                                            s= s + "<td>+" + aux +"<font color='#0000FF'>X</font><sub>"+i+"</sub></td>";
                                                            }else
                                                            {
                                                            s= s + "<td>+" + "<font color='#0000FF'>X</font><sub>"+i+"</sub></td>";    
                                                            }   
              
              }           
          }
        else
          {
            s= s + "<td>"+ aux +"<font color='#0000FF'>X</font><sub>"+i+"</sub></td>";
          }     
        }else
                                {
                                    s= s + "<td></td>";
                                }
      }
    aux = document.getElementById("cmbr"+j).value;    
    s= s + "<td>" + aux +"</td>" ;
    aux = document.getElementById("txtrhs"+j).value;    
    s= s + "<td>"+aux +"</td>"; 
    s= s +"</tr>";
                } 
s= s + "</table>Xi>=0<br><br>Mostrar Iteraciones<input type='checkbox' name='chkiteraciones' checked  value='ON' id='chkiteraciones'><br>";
s= s + "<br>";
s= s+"<div><button  class='pure-button pure-button-primary' onclick='resolver()'><i class='fa fa-th'> </i> Resolver </button></div>";   
document.getElementById('jmodelo').innerHTML=s;
}
function resolver()
{
    var s;
    var n,m;
    var i,j,k;
    var objetivo;
    var generarreporte;
      
    //inicializar ls variables...
    n=0;
    m=0;
    i=0;
    j=0;
    k=0;    
    s="";
    objetivo=0;
    generarreporte=false;
           
    n= parseInt(document.getElementById("idnovariables").value);
    m= parseInt(document.getElementById("idnorestricciones").value);
    
    var a_problema = new Array(m+1);
    for (i=0; i<=m+1; i++)
    {
    a_problema[i] = new Array(n+2);
    }
    
    
    for (i=0; i<=m+1; i++)
        {
        for (j=0; j<=n+2; j++)
            {
            a_problema[i][j]= 0;
             }
        }
   
    //vamos a llenar el arreglo, con los valores digitadores por la persona en la matriz...
    //primero , los coeficientes en la funcion objetivo...
    
    for (i=1; i<=n; i++)
        {
            if (document.getElementById("txtx"+i).value=="")
            {
                a_problema[0][i]= 0;
            }else
            {
                a_problema[0][i]= parseFloat(document.getElementById("txtx"+i).value);
            }        
        }
        
        for (i=1; i<=m; i++)
        {
            for (j=1; j<=n; j++)
                    {
                        if (document.getElementById("txtr"+i+"x"+j).value=="")
                        {
                            a_problema[i][j]= 0;
                        }else
                        {
                            a_problema[i][j]= parseFloat(document.getElementById("txtr"+i+"x"+j).value);
                        }
                        
                    }
            a_problema[i][n+1]= document.getElementById("cmbr"+i).value;
            if (document.getElementById("txtrhs"+i).value=="")
            {
                a_problema[i][n+2]= 0;
            }else
            {
                a_problema[i][n+2]= parseFloat(document.getElementById("txtrhs"+i).value);    
            }   
            
         }
  
  /*
  s=s + "<br><Table border='1'>";
  for (i=0; i<=m; i++)
    {
         s=s + "<tr>";    
        for (j=0; j<=n+2; j++)
        {
             s=s + "<td>" +  a_problema[i][j] + "</td>";
        }
        s=s + "</tr>";   
    }
    s=s + "</table>";   
    */
        
    //inicializar...
    
    var p= new jsimplex("jsolucion");
    
    document.getElementById("jsolucion").innerHTML="";    
    if (document.getElementById("idoptmaximizar").checked==true)
    {
        p.maximizar=true;
    }else
    {
        p.maximizar=false;
    } 
    
    p.documentar = document.getElementById("chkiteraciones").checked;   
    
    p.novariables= n;
    p.norestricciones = m;
    p.problema = a_problema;
    //p.normalizar();    
    //p.calcularzeta();
    //i=p.quienentra();
    //j=p.quiensale(i);
    //p.documentarmatrix();
    //p.gauss(j,i);
    //p.calcularzeta();
    //i=p.quienentra();
    //j=p.quiensale(i);
    //p.documentarmatrix();
    //p.gauss(j,i); 
    //p.calcularzeta();
    // p.documentarmatrix();
    p.solucionar();
     
}
            </script>
         </br>
      </br>
   </div>
</div>
@endsection


@section('js2')
<script type="text/javascript">
   function envio(){
      
      var datos = $("#formulario").serialize();

      console.log(datos);
    /*$.ajax({
      type:"POST",
      url: "/matriculas/public/modelo/store",
      async: false//,
      data: $("#formulario").serialize(),
      //data: 'modulo='+modulo+'&tema='+tema+'&opc='+opc+'&division='+division
    }).done(function(data){
      //var s = JSON.parse(data);
      datos = data;
    });*/

    //window.location = "modelo/store"

  }
</script>
@endsection
