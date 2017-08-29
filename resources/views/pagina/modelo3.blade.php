@extends('pagina.template.principal')

@section('titulo', 'Modelo')

@section('js1')
<script src="{{ asset('plugin/simplex/simplex.jsaa') }}">
</script>
<script type="text/javascript">
   var variables;
   $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();

      $.ajax({
        url: "variablesPost/1",
        async: false
     }).done(function(result) {

      variables = eval(result);
      //alert(variables[1]);
   });


  });


   function imprSelec(muestra)
   {
    var ficha=document.getElementById('jsolucion');
    var modelo=document.getElementById('jmodelo');
    var logete=document.getElementById('logete');


    var ventimp=window.open(' ','popimpr');
    ventimp.document.write('<h2><center>Software PigModel</center></h2> <br><br><br>');
	//ventimp.document.write(logete.innerHTML);
	ventimp.document.write(modelo.innerHTML);
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();ventimp.print();
	ventimp.close();
}
</script>
@endsection

@section('pagina', 'Modelo')

@section('contenido')

{!! Form::open(['id' => 'formulario_modelo', 'method' => 'POST', 'files' => true]) !!}
<div class="row text-left">
   <div class="col-md-2">
   </div>
   <div class="col-md-4">
      <div class="box box-danger">
         <div class="box-header">
            <h3 class="box-title">
               Parametros
            </h3>
         </div>
         <div class="box-body">
            <!-- Date mm/dd/yyyy -->
            <div class="form-group">
               <label>
                  Variables De Decisión
               </label>
               <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-calendar">
                     </i>
                  </div>
                  <input class="form-control" id="idnovariables" name="txtnovariables" type="number" value="1">
               </input>
            </div>
            <!-- /.input group -->
         </div>
         <!-- /.form group -->
         <!-- IP mask -->
         <div class="form-group">
            <label>
               Restricciones
            </label>
            <div class="input-group">
               <div class="input-group-addon">
                  <i class="fa fa-laptop">
                  </i>
               </div>
               <input class="form-control" id="idnorestricciones" name="txtnorestricciones" type="number" value="1">
            </input>
         </div>
         <!-- /.input group -->
         <div class="col-md-12">
            <div class="form-group">
               <label>
                  Objetivo de la función
               </label>
               <div class="radio">
                  <label>
                     <input checked="checked" id="idoptmaximizar" name="objetivo" type="radio" value="max">
                     Maximizar
                  </input>
               </label>
               <label>
                  <input id="idoptminimizar" name="objetivo" type="radio" value="min">
                  Minimizar
               </input>
            </label>
         </div>
      </div>
   </div>

</div>
<!-- /.form group -->
<button class="btn btn-danger" id="btniniciar" onclick="preparar();" type="button">
   Iniciar  
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="exampleModalLabel"><b>Parametros para guardar el modelo</b></h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
       </button>
    </div>
    <div class="modal-body">

       <div class="form-group">
          <label for="recipient-name" class="form-control-label">Nombre: <b>(*)</b></label>
          <input type="text" class="form-control" id="modelnombre" name="modelnombre" required="Nombre Requerido para almacenar" >
       </div>
       <div class="form-group">
         <label for="message-text" class="form-control-label">Descripcion:</label>
         <textarea class="form-control" id="modelodescripcion" name="modelodescripcion"></textarea>
      </div>

   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      <button class="btn btn-danger" onclick="return confirm('¿Seguro Desea Almacenar?')" type="submit">
         Guardar
      </button>
   </div>
</div>
</div>
</div>
{!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<div class="col-md-4">
   <div class="box box-danger">
      <div class="box-header">
         <h3 class="box-title">
            Matriz Estandar
         </h3>
      </div>
      <div class="box-body" >
         <div id="jmodelo" style="overflow-y: scroll;">
            <font color="#000000" face="Verdana" size="2">
               <table class='h-scroll'>
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
               <input id="chkiteraciones" name="chkiteraciones" style="display: none;" type="checkbox" value="">

            </input>
         </font>
      </div>
   </div>
</div>
<div class="text-right">
   <button class="btn btn-danger" onclick="history.go(0)" type="button">
      Limpiar
   </button>
   <button class="btn btn-danger" onclick="resolver()" type="button" id="btnsolucionar" disabled>
      Solucionar
   </button>
</div>
</div>
</div>
<!-- /.box-body -->
<!-- /.box -->
<div class="row">
   <div class="col-md-12">
      <div class="box box-info">
         <div class="box-header">
            <h3 class="box-title">
               Variables
            </h3>
         </div>
         <div class="box-body">
            <div class="row">
               <div class="col-md-4">
               </div>

            </div>
            <div class="row">
               <div class="col-md-12">
                  <label>
                     Función
                  </label>
                  <div class="form-group">
                     <div class="input-group" id="idgridproblema" style="width: 500px;">
                        <table class="input-group-addon" class='h-scroll'>
                           <tbody>
                              <tr>
                                 <td>
                                 </td>
                                 <td >
                                    <label class="jcell" onmouseover='' data-toggle='tooltip' data-placement='bottom' title='{{ $arreglo['1'] }}' class='jcell' id='X"+i+"'>
                                       X<sub>1</sub>
                                    </label>
                                 </td>
                                 <td >
                                    <label class="jcell" onmouseover='' data-toggle='tooltip' data-placement='bottom' title='{{ $arreglo['2'] }}' class='jcell' id='X"+i+"'>
                                       X<sub>2</sub>
                                    </label>
                                 </td>
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
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12" id="jsolucion" style="overflow-y: scroll;">
               <h2>
                  Solución
               </h2>
               <table class='h-scroll'>
                  <th>
                     <td>
                        Z
                     </td>
                  </th>
               </table>
               <font color="#0000FF">
                  X
               </font>
               <sub>
                  1
               </sub>
               = 0
               <font color="#0000FF">
                  X
               </font>
               <sub>
                  2
               </sub>
               = 12
               <font color="#0000FF">
                  S
               </font>
               <sub>
                  1
               </sub>
               = 0
               <font color="#0000FF">
                  S
               </font>
               <sub>
                  2
               </sub>
               = 12
               <font color="#0000FF">
                  A
               </font>
               <sub>
                  1
               </sub>
               = 0
               <font color="#0000FF">
                  A
               </font>
               <sub>
                  2
               </sub>
               = 0
               <b>
                  <font color="#0000FF">
                     Z
                  </font>
               </b>
               = 6000
            </div>
            <div class="col-md-12">
               <div class="text-right">     
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" id="btnalmacenar" disabled>Almacenar</button>
                  <button class="btn btn-danger" onclick="imprSelec('imprimir')" type="button">
                     Imprimir
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!-- /.box-body -->
<!-- /.box -->
<!-- /.col (left) -->
<div class="row">
   <div class="col-md-12">
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
           s=s+"Introduzca los coeficientes del problema:";       
           s= s+"<table bordercolor='#FFFFFF' class='h-scroll'> ";
           s= s+"<tr>";
           s= s+"<td></td>";
           for (i=1; i<=novariables; i++)
           {
            var vari = variables[i];
            if(vari == null){
               vari = "No Definido";
            }
            s= s+"<td class='text-center'>";
            s += "<label onmouseover='' data-toggle='tooltip' data-placement='bottom' title='"+vari+"' class='jcell' id='X"+i+"'>X<sub>"+i+"</sub></label>" 
            s += "</td>";
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
         s= s+ "<td><input type='text' name='txtx" +  j + "' size='5' onkeypress='return solonumeros(event)' onblur='jmodelo()' maxlength='6' id='txtx" + j + "'  ></td> ";     
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
         s= s+"<td><input type='text' name='txtr"+i+"x"+j+"' id='txtr"+i+"x"+j+"'  size='5' onkeypress='return solonumeros(event)' onblur='jmodelo()' maxlength='6'  ></td>";
      }
      s= s + "<td> <select size='1' name='cmbr"+i+"' id='cmbr"+i+"'><option selected value='<=''><=</option><option value='>='> >= </option><option value='='> = </option></select></td>";
      s= s + "<td> <input type='text' name='txtrhs"+i+"' size='5' onkeypress='return solonumeros(event)' onblur='jmodelo()' maxlength='6' id='txtrhs"+i+"'  ></td>";          
      s= s+"</tr>";
   }       

   $('#btnsolucionar').attr('disabled', false)
   s= s+"</table>";
   document.getElementById("idgridproblema").innerHTML= s;          
   ///$('#jmodelo').attr('overflow', "scroll")
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

 s="<font face='Verdana' size='2' color='#000000'>";
 s= s + "<table class='h-scroll'";
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
s= s + "</table>Xi>=0<input style='display:none;' type='checkbox' name='chkiteraciones' value='OFF' id='chkiteraciones'>";
s= s + "";
//s= s+"<div></div>";   
//document.getElementById('jmodelo').innerHTML=s;
//document.getElementById("jmodelo").style.overflow-y = "scroll"; //overflow-y: scroll;

//$("#jmodelo").attr("overflow", "scroll")
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
  s=s + "<Table border='1'>";
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
    $('#btnalmacenar').attr('disabled', false)
 }
</script>
</div>
</div>
@endsection


@section('js2')
<script type="text/javascript">

   /*function envio(){
      var datos = $("#formulario_modelo").serialize();

      console.log(datos);
   }*/

   //function envio(){

     // var datos = $("#formulario").serialize();

    //  console.log(datos);
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

 //}
</script>
{!! Form::close() !!}
@endsection
