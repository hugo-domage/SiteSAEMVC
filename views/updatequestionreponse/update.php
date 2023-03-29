<?php
echo('<h3> Modifier les Questions et les Réponses </h3>
                
                <form method="post" action="/updatequestionreponse/update" enctype="multipart/form-data">
                        <label> Difficulty of the question (F, M, D) : </label>
                        <input type="text" name="difficulty" class="form-control" value="'. $A_view['type_question'] .'" placeholder="Difficulty"/>
                    
                        <label> QCM (O,N) </label>
                        <input type="text" name="qcm" class="form-control" value="'. $A_view['qcm'] .'" placeholder="QCM" />
                    
                    
                        <label> Question </label>
                        <input type="text" name="question" class="form-control" value="'. $A_view['question'] .'" placeholder="Question" />
                   
                        <label> Answer : </label>
                        <input type="text" name="reponse" class="form-control" value="'. $A_view['reponse'] .'" placeholder="Answer" />
       
    
                        <input type="submit" name="btn_edit" class="btn-edit" value="Edit" />
                
                </form>        
                <label><a href="/allquestionreponse"><b>Retour au questions --></b></a></label>
 
');

if(isset($A_view['message'])){
    echo ($A_view['message']);
}