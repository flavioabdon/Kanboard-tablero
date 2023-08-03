<style>
#div1, #div2 ,#div3{
  float: left;
  width: 100%;
  height: 500px;
  margin: 10px;
  padding: 10px;
  border: 1px solid black;
}
</style>

<script>
var ev_target_allowDrop=""
var ev_target_drag="";
var ev_target_drop="";

function allowDrop(ev) {
  ev_target_allowDrop=ev.target.id;

  console.log("allowDrop:::"+ev_target_allowDrop+":");
    if(ev_target_drag!=ev_target_allowDrop && ev_target_allowDrop!=""){
        ev.preventDefault();
    }
  
}

function drag(ev) {
    // el elemento ev.target.id es el id del card
  ev.dataTransfer.setData("text", ev.target.id);

  ev_target_drag=ev.target.id;

  console.log("drag:::"+ev_target_drag);
}

function drop(ev) {
  ev.preventDefault();

  ev_target_drop=ev.target.id;

  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
  console.log("drop:::"+ev_target_drop);
}
</script>

<div class="container-fluid">
	<div class="row" style="padding-top: 15px;";>
		<div class="col-md-4">
            <h3 style="text-align: center;">Es espera</h3>
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
                <div class="card" draggable="true" ondragstart="drag(event)" id="drag2" width="88" height="31">
                    <div class="card-body" style="font-size:70%;">
                        <p style="text-align:center;"><b>MS-0001</b></p>
                        <p><b>Descripción:</b> Elaborar la descripción de...</p>
                    </div>
                    <div class="card-footer" style="font-size:70%;">
                        <p> <b>Tiempo Restante:</b>1 Día 25:05 Horas</p>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-md-4">
            <h3 style="text-align: center;">En Proceso</h3>
            <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		</div>
		<div class="col-md-4">
            <h3 style="text-align: center;">Terminado</h3>
            <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
		</div>
	</div>
</div>