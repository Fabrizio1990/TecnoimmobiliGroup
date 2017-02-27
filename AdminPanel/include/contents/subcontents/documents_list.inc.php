<?php
$docs = $docMng->getDocuments("enabled = 1","order by date_ins");


?>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista Documenti</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover" id="tb_documents_list">
                    <tr>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Tipo Documento</th>
                        <th>Data Inserimento</th>
                        <th>Azioni</th>
                    </tr>
                    <?php
                        foreach($docs as $doc){
                        $date = Date("d-m-Y",strtotime($doc["date_ins"]));
                            $docFullPath = SITE_URL."/".$doc['save_path']."/".$doc["filename"];

                            $row = "<tr>";
                                $row.= "<td><p class='doc_title'>".$doc['title']."</p></td>";
                                $row.= "<td><p class='doc_desc'>".$doc['description']."</p></td>";
                                $row.= "<td class='td_icon_file'>";
                                    $row.= "<a target='_blank' href='".$docFullPath."'>";
                                        $row.= "<img src='".SITE_URL."/".$doc['icon_path']."'";
                                    $row.= "</a>";
                                $row.= "</td>";
                                $row.= "<td>".$date."</td>";
                                if($SS_usr->id_user_type==1) {
                                    $row .= "<td>
                                                <div class='btn-group'>
                                                    <input type='hidden' class='doc_id' value='".$doc["id"]."'/>
                                                    <button type='button' class='btn btn-info edit_document'>
                                                        <i class='fa fa-edit'></i>
                                                    </button>
                                                    <button type='button'  class='btn btn-danger delete_document'>
                                                        <i class='fa fa-remove'></i>
                                                    </button>
                                                </div>
                                            </td>";
                                }else{
                                    $row.="<td>";
                                        $row.= "<a target='_blank' href='".$doc['path']."'>";
                                            $row.= "<span class='glyphicon glyphicon-download-alt'></span>";
                                        $row.= "</a>";
                                    $row.="</td>";
                                }
                            $row.="</tr>";
                            echo($row);
                        }
                    ?>


                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>