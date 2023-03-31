<?php
echo('<body class="add-body">
        <h3 class="add-title"> Add questions and answers </h3>   
                <form class="form-add" method="post" action="/addquestionreponse/add" enctype="multipart/form-data">
                        <label class="label-add"> Difficulty of the question (F, M, D) : </label>
                        <input class="input-add" type="text" name="difficulty" value="" placeholder="Difficulty"/>
                    
                    
                        <label class="label-add"> QCM (O,N) </label>
                        <input class="input-add" type="text" name="qcm"  value="" placeholder="QCM" />
                    
                    
                        <label class="label-add"> Question </label>
                        <input class="input-add" type="text" name="question"  value="" placeholder="Question" />
                   
                        <label class="label-add"> Answer : </label>
                        <input class="input-add" type="text" name="reponse"  value="" placeholder="Answer" />
       
    
                        <input class="btn-save-add" type="submit" name="btn_add" value="Save" />
                
                </form>        
                <a href="/allquestionreponse"><b class="dir-add">Retour au questions --></b></a>
 </body>
');
if(isset($A_view['message'])){
    echo ($A_view['message']);
}
