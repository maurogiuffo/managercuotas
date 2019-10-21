<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <title>Recibo</title>


 <style>
body {
  padding: 50px;
}

td{
   font-size: 11px;
}

th{
   font-size: 12px;
}

* {
  box-sizing: border-box;
}

.receipt-main {
  display: inline-block;
  width: 100%;
  padding: 15px;
  font-size: 12px;
  border: 1px solid #000;
}

.receipt-title {
  text-align: center;
  text-transform: uppercase;
  font-size: 20px;
  font-weight: 600;
  margin: 0;
}
  
.receipt-label {
  font-weight: 600;
}

.text-large {
  font-size: 16px;
}

.receipt-section {
  margin-top: 10px;
}

.receipt-footer {
  text-align: center;
  background: #ff0000;
}

.receipt-signature {
  height: 80px;
  margin: 50px 0;
  padding: 0 50px;
  background: #fff;
}

.receipt-line {
  margin-bottom: 10px;
  border-bottom: 1px solid #000;
}
  
p {
  text-align: center;
  margin: 0;
}


.headerLogo {
  width: 100px;
  padding: 5px;
}

.header {
  width: 100px;
  padding: 15px;
  font-size: 12px;
}


</style>

</head>

<body>

  <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Listado Recibos</span>
  </div>  


  <div >
    <table>
      <tr >
        <td class="header">
          Desde: {{$fechaInicial}}
        </td>

        <td class="header">
          Hasta: {{$fechaFinal}}
        </td>
        <td class="header">
          Forma de Pago: {{$forma_pago}}
        </td>
        <td class="header" >
         
        </td>
      </tr>
    
    </table>
  </div>

  <div class="receipt-section">
    <table width="100%">
                  <thead>
                    <tr>
                      <th>Numero</th>
                      <th>Fecha</th>
                      
                      <th>Cliente</th>
                      <th>Forma de Pago</th>
                      <th>Importe</th>
                      
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($recibos as $recibo )
                    <tr>
                      <td>{{ $recibo->id}}</td>
                      <td>{{ $recibo->created_at}}</td>
                      <td>{{ $recibo->cliente->nombre }} {{ $recibo->cliente->apellido}}</td>
                      <td>{{ $recibo->forma_pago}}</td>
                      <td>{{ $recibo->importe}}</td>
                   
                    
                    </tr>
                    @endforeach
                  </tbody>
    </table>
  </div>
   

  <div class="receipt-section">
      <span class="header">  Total: {{$total}}</span>
  </div>
  

</body>
</html>