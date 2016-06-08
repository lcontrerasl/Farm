<html>
    <body>
        <form action="accform/ingresoUsuario.php" method="POST">
            <table>
                <tr>
                    <td width="10%"><label>NOMBRE</label></td>              
                    <td><input type="text" name="nombreUsuario" id="nombreUsuario"> </td>                    
                </tr>               
                <tr>
                    <td width="10%"><label>RUT</label></td>                
                    <td> <input type="text" name="rutUsuario" id="rutUsuario"> </td>
                </tr>
                <tr>
                    <td><label>APELLIDO PATERNO</label></td>                    
                    <td><input type="text" name="ap_paternoUsuario" id="ap_paternoUsuario"></td>
                </tr>
                <tr>
                    <td><label>APELLIDO MATERNO</label>       </td>
                    <td><input type="text" name="ap_maternoUsuario" id="ap_maternoUsuario"></td>
                </tr>
                <tr>
                    <td><label>MAIL</label>    </td>
                    <td><input type="email" name="mailUsuario" id="mailUsuario"></td>
                </tr>
                <tr>
                    <td><label>PASSWORD</label> </td>
                    <td><input type="password" name="passUsuario" id="passUsuario"></td>
                </tr>                  
                <tr>
                    <td> <input type="submit" value="Guardar"></td>
                </tr> 
            </table>
        </form>
    </body>
</html>

