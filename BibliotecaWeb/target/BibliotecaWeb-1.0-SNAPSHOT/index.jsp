<%@page import="java.sql.*"%>
<%@page import="com.mysql.cj.jdbc.Driver"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>CRUD EDITORIAL</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <%
            String db="biblioteca";
            String url= "jdbc:mysql://localhost:3309/";
            String user = "root";
            String password = "";
            String driver = "com.mysql.cj.jdbc.Driver";
            Connection con= null;
            Statement st = null;
            ResultSet rs = null;
        %>
        <div class="container">
            <table class="table table-striped mt-5">
                <thead>
                     <tr>
                        <th scope=" class="text-center" colspan="4"><h2 class="text-center">EDITORIAL</h2></th>
                        <th scope="col">
                            <a><i class="yext-center fa fa-user-plus" aria-hidden="true"></i></a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <%
                        Class.forName(driver);
                        con = DriverManager.getConnection(url+db,user,password);
                        st=con.createStatement();
                        
                        rs=st.executeQuery("select * from editorial");
                        while(rs.next()){
                            
                        
                    %>
                    <tr>
                        <th scope="row"><%=rs.getString(1)%></th>
                        <td><%=rs.getString(2)%></td>
                        <td><%=rs.getString(3)%></td>
                        <td><%=rs.getString(4)%></td>
                        <td class="text-center">
                            <a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <%}
                    %>
                </tbody>
            </table>
        </div>
    </body>
</html>
