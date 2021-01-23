<?php  
session_start();
$codUsuS=$_SESSION['codUsuario'];
$busquedaFiltro=$_POST['busqueda'];
                      include_once("../modelo/m_expediente.php");
                      $codArea=expediente::extraerDatos_codArea($codUsuS);
                      $ejecutar=expediente::extraerDatos_listarExpedienteEnrutar($busquedaFiltro,$codArea);
                      $cadena='';
                      for($i=0;$row=mysqli_fetch_array($ejecutar);$i++)
                      {   
                          $codExp=$row['codigo'];
                          $codigoExpedienteCom=$row['codigoExpedienteCom'];
                          $fecha=$row['fecha'];                          
                          $areaOrigen=$row['areaOrigen'];
                          $areaDestino=$row['areaDestino'];
                          $nomTra=$row['nomEstTra'];
                          $estado=$row['estado'];
                          $estTra="";
                          $cancelar="";
                         
                          if($estado==1)
                          {
                            $cancelar="<a href='javascript: cancelarEnrutarAreaExp1(".$codExp.")' class='btn btn-danger btn-sm' title='Cancelar enrutamiento'><img src='../img/arrow-left.svg'></a>";
                             
                            $estTra="<td>".$nomTra."</td>";
                            
                          }
                          else
                          { 
                            $cancelar="-";
                            $estTra="<td class='bg-danger'>ANULADO</td>";                            
                          }
                                                   
                          
                          $n=$i+1;
                    $cadena=$cadena."
                            <tr>
                      <th scope='row'>".$n."</th>
                      <td>".$codigoExpedienteCom."</td>
                      <td>".$fecha."</td>
                      <td>".$areaOrigen."</td> 
                      <td>".$areaDestino."</td> 
                      ".$estTra."
                                            
                      <td><a target='_blank' href='../vista/r_expediente.php?codExp=".$codExp."' class='btn btn-danger btn-sm' title='Informe PDF' ><img src='../img/file-text.svg' ></a>
                      </td>
                      <td><a target='_blank' href='../vista/r_trazabilidadExpediente.php?codExp=".$codExp."' class='btn btn-primary btn-sm' title='Informe trazabilidad'><img src='../img/file-text.svg'></a>
                      </td>
                      <td><a target='_blank' href='../vista/r_rutaExpediente.php?codExp=".$codExp."' class='btn btn-primary btn-sm'><img src='../img/file-text.svg'></a>
                      </td>
                      <td>".$cancelar."
                      </td>
                      
                      </tr>
                    ";
                    }
                     
                      
                      echo $cadena;
 ?>
