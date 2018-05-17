<?php  
include_once 'utilities.php';

// Creamos variables temporales
$folio = count($ventas)+1;
$fecha = fecha_actual();
$total = 0;
$descripcion = '';
$cantidad = 0;
$productos_venta = array();

// Si se ejecuta el submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['agregar'])) {
        # code...
    }

    if (isset($_POST['cantidad'])) {
        $cantidad = $_POST['cantidad'];
    }
}
?>

    <?php require_once('header.php'); ?>
    <div class="row">
        
    	<div class="large-9 columns">
    		<h3>Nueva Venta</h3>
    		<section class="section">
    			<div class="content" data-slug="panel1">
                    <!--<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
                        
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="cantidad">Cantidad:</label>
                                        <input id="cantidad" min="1" type="number" name="cantidad">
                                        
                                    </td>
                                    <td>
                                        <label for="product">Producto:</label>
                                        <input type="text" placeholder="Producto" class="flexdatalist" data-min-length="1" multiple="multiple" data-selection-required="1" list="productos" name="products" id="product">

                                        <datalist id="productos">
                                            <?php foreach ($productos as $p) {
                                                echo "<option value='".$p->nombre."'>";
                                            } ?>
                                        </datalist>
                                    </td>
                                    <td style="">
                                        <label for="add"><?php echo "\t"; ?></label>
                                         <input type="submit" id="add" class="button success tiny" name="add" value="Agregar">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table id="tabla_prod">
                            <thead>
                                <tr>
                                    <th>ID Prod.</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                    <th>Cancelar</th>
                                </tr>
                            </thead>
                        </table>

		                Total: <input type="text" id="total" name="total" value="<?php echo $total;?>">
		      
		                <br>
		                <center><input style="border-radius: 15px;" type="submit" class="button" id="submit" name="submit" value="Guardar"></center>
		            <!-- </form> -->
    			</div>
    		</section>
    	</div>

        <div class="large-3 columns">
            <h1><img src="./img/shopping-cart.png"/ style="width: 250px;height: 250px;"></h1>
        </div>

    </div>
    
    <script type="text/javascript">
        // Obtenemos la tabla de venta
        var tabla = document.getElementById('tabla_prod');
        
        // Campo de texto para cantidad de elementos de un producto a comprar
        var cantidad = document.getElementById('cantidad');
        cantidad.style.width = '60px'; // Asiganmos un tamaño
        cantidad.value = ''; // Vacio por defecto
    
        // Campo de texto del producto a selecionar
        var producto = document.getElementById('product');
        // Funcion en caso de que cambie el contenido del input        
        producto.onchange = function product_change(e) {
            if (producto.value) { // Si se asigno un producto
                cantidad.value = 1; // Establecemos uno por defecto
            }else{ // De lo contrario cero
                cantidad.value = 0;
            }
        }

        var total = document.getElementById('total');
        total.style.width = '160px';
        total.readOnly = true;

        // Boton para añadir producto
        var add = document.getElementById('add');
        // Metodo cuando hace click al añadir producto
        function add_click(e) {
            if (producto.value && cantidad.value!=0) {
                
                var num_filas = tabla.rows.length; // Obtenemos total de filas
                var fila = tabla.insertRow(num_filas); // Añadimos fila al final

                // Añadimos celdas a la nueva fila
                var id_cell = fila.insertCell(0); // Celda para Id del prod.
                var nom_cell = fila.insertCell(1); // Celda para nombre del producto
                var cant_cell = fila.insertCell(2); // Celda para cantidad de productos
                var unit_cell = fila.insertCell(3); // Celda para cantidad de productos
                var tota_cell = fila.insertCell(4); // Celda para cantidad de productos
                var quit_cell = fila.insertCell(5); // Celda para cantidad de productos

                var id_txt = document.createElement('input');
                id_txt.type = 'number';
                id_txt.value = num_filas;
                id_txt.style.width = '55px';
                id_txt.readOnly = true;
                id_cell.appendChild(id_txt);

                var nom_txt = document.createElement('input');
                nom_txt.type = 'text';
                nom_txt.value = producto.value;
                nom_txt.style.width = '125px';
                nom_txt.readOnly = true;
                nom_cell.appendChild(nom_txt);

                var cant_txt = document.createElement('input');
                cant_txt.type = 'number';
                cant_txt.value = cantidad.value;
                cant_txt.style.width = '55px';
                cant_txt.readOnly = true;
                cant_cell.appendChild(cant_txt);

                //nom_prod.appendChild(producto.value);
                //cant_prod.appendChild(cantidad.value);
                //descrip.value += cantidad.value+" - "+producto.value+"\n";

                producto.value = '';
                cantidad.value = 0;
            }else if(cantidad.value==0 && producto.value){
                alert('Seleccione una cantidad mayor a 0.');
                cantidad.focus();
            }else{
                alert('Seleccione un producto');
                producto.focus();
            }
        }
        add.addEventListener('click',add_click);
    </script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <?php require_once('footer.php'); ?>