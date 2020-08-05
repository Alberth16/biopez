function FechaActual (){
    var meses = new Array('','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');
    var diaSem= new Array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo')
    var f  = new Date();
    var d = f.getDate();
    d=checkTime(d)

    var fecha = diaSem[f.getDate()+1]+' '+d+'-'+meses[f.getMonth()+1]+'-'+f.getFullYear();
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
    