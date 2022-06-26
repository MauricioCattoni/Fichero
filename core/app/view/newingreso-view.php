<div class="content">
               <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Nuevo ingreso
                        </h1>
                        <!--
                        <ol class="breadcrumb">
                            <li>
                                  <a href="./?view=index"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                  <a href="./?view=ingresos"><i class="fa fa-file"></i> Ingresos</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-asterisk"></i> Nuevo plan
                            </li>
                        </ol>
                        -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form role="form" method="post" action="./?action=addingreso" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Legajo</label>
                                <input type="number" name="legajo" class="form-control" placeholder="Escriba el legajo" required>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" placeholder="Escriba el nombre" >
                            </div>
                            <div class="form-group">
                                <label>Foto perfil</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label>Entrada</label>
                                <input type="datetime-local" name="entrada" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Salida</label>
                                <input type="datetime-local" name="salida" class="form-control">
                            </div>
                            
                          
                           
                        
                          

                            <button type="submit" class="btn btn-primary">Nuevo</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>

                    </div>
                    <div class="col-lg-3">


                    </div>
                </div>
                <!-- /.row -->
<br><br><br><br><br>
</div>