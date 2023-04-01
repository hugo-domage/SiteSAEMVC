<?php
echo('<body class="add-body">
    <h3 class="add-title"> Modifier les Questions et les Réponses </h3>
                
                <form class="form-add" method="post" action="/updatequestionreponse/update" enctype="multipart/form-data">
                
                        <input type="hidden" name="id" class="input-add" value="'. $A_view['id'] .'" placeholder="Difficulty" />
                        <label class="label-add"> Difficulty of the question (F, M, D) : </label>
                        <input type="text" name="difficulty" class="label-add" value="'. $A_view['type_question'] .'" placeholder="Difficulty"/>
                    
                        <label class="label-add"> QCM (O,N) </label>
                        <input type="text" name="qcm" class="input-add" value="'. $A_view['qcm'] .'" placeholder="QCM" />
                    
                        <label class="label-add"> Question </label>
                        <input type="text" name="question" class="input-add" value="'. $A_view['question'] .'" placeholder="Question" />
                   
                        <label class="label-add"> Answer : </label>
                        <input class="input-add" type="text" name="reponse" value="'. $A_view['reponse'] .'" placeholder="Answer" />
       
    
                        <input type="submit" name="btn_edit" class="btn-edit-add" value="Edit" />
                
                </form>        
                <a href="/allquestionreponse"><b class="dir-add">Retour au questions --></b></a>
    </body>
');

if(isset($A_view['message'])){
    echo ($A_view['message']);
}