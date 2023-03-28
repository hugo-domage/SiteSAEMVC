<?php
echo('<h3> Add questions and answers </h3>
                
                <form method="post" action="/addquestionreponse/add" enctype="multipart/form-data">
                        <label> Difficulty of the question (F, M, D) : </label>
                        <input type="text" name="difficulty" class="form-control" value="" placeholder="Difficulty"/>
                    
                    
                        <label> QCM (O,N) </label>
                        <input type="text" name="qcm" class="form-control" value="" placeholder="QCM" />
                    
                    
                        <label> Question </label>
                        <input type="text" name="question" class="form-control" value="" placeholder="Question" />
                   
                        <label> Answer : </label>
                        <input type="text" name="reponse" class="form-control" value="" placeholder="Answer" />
       
    
                        <input type="submit" name="btn_add" class="btn-save" value="Save" />
                
                </form>        
                <label><a href="/allquestionreponse"><b>Retour au questions --></b></a></label>
 
');
if(isset($A_view['message'])){
    echo ($A_view['message']);
}
