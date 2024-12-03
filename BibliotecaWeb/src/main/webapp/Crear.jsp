<%@page import="java.sql.*"%>
<%@page import="com.mysql.cj.jdbc.Driver"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>INSERTAR EDITORIAL</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Editorial</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion Editorial</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Nombre Editorial</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
