<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax request with jQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<main>
   
    <section class="container"> 
        <h1>Ajax request with jQuery</h1>
        <span id="status"> </span><br><br>
        <form id="AjaxRequest" method="GET">
        
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Telephone</label>
                <input type="text" class="form-control" name="tel" placeholder="Telephone">
            </div>
            <button type="submit" class="btn btn-info" name="sub">Submit</button>
        </form>
       <span id="status1"> </span><br><br>
        <div class="row">
        
            <table id="contacts" class="table" scope="row">
                <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Telephone</th></tr></thead>
                <tr>
                <?php
                require_once 'test2.php';
                // echo $test->getCount();
               
                ?>
                <!--</tr>
                <tbody>
                <tr scope="row">
                    <td><?php echo $test->selectAll($id); ?></td>
                    <td id="tdName">Mark</td>
                    <td id="tdEmail">Otto</td>
                    <td id="tdTel">@mdo</td>
                </tr>-->
                </tbody>
            </table>
        </div>
    </section>
</main>
    

</body>
</html>