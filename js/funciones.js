function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

function FechaActual (){
    var meses = new Array('','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');
    var f  = new Date();
    var dia=new Array(7);
    dia[0]="Domingo";
    dia[1]="Lunes";
    dia[2]="Martes";
    dia[3]="Miercoles";
    dia[4]="Jueves";
    dia[5]="Viernes";
    dia[6]="Sabado";

    
    var d = f.getDate();
    d=checkTime(d)

    var fecha = dia[f.getDay()]+' '+d+'-'+meses[f.getMonth()+1]+'-'+f.getFullYear();
    $('.fecha').html(fecha);

}

function HoraActual(){

    today=new Date();    
    h=today.getHours();    
    m=today.getMinutes();    
    s=today.getSeconds(); 
    h=checkTime(h);   
    m=checkTime(m);    
    s=checkTime(s);    
    hora = h+":"+m+":"+s
    $('.hora').html(hora);
    
    t=setTimeout('HoraActual()',500);
}
    
function checkTime(i){
    if (i<10) {i="0" + i;}
    return i;
}
    

function esNumero(evt, item){
    var key = (evt.which) ? evt.which : evt.keyCode;
    //alert(key);
    let cadena = document.getElementById(item).value;    
    if(cadena.indexOf('.') == -1){
        return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
    }else{
        return (key <= 13 || (key >= 48 && key <= 57));
    }
 };

 function calculoElectricidad(id1, id2){
    var lectura1 = document.getElementById(id1).value;
    var lectura2 = document.getElementById(id2).value;
    var resultado = lectura2 - lectura1;

    return resultado;
 }

 function colorResultado(){
    var result = $('.resultados').html();
    if(result == 0){  
        $('.resultados').css('color','Black'); 
    } else{
        if(result < 0){  
            $('.resultados').css('color','Red');
        }else {
            if(result > 0){  
                $('.resultados').css('color','Blue')
            }
        }
    }
 }