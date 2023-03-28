<?php
echo('<h3> Add questions and answers </h3>
            <hr>
            <div>
                <form method="post" action="">
                    <div class="form-group">
                        <label> ID </label>
                        <input type="text" name="id" class="form-control" value="" placeholder="ID" readonly="readonly"/>
                    </div>
                    <div class="form-group">
                        <label> Difficulty of the question (F, M, D) : </label>
                        <input type="text" name="difficulty" class="form-control" value="" placeholder="Difficulty"/>
                    </div>
                    <div class="form-group">
                        <label> QCM (O,N) </label>
                        <input type="text" name="qcm" class="form-control" value="" placeholder="QCM" />
                    </div>
                    <div class="form-group">
                        <label> Question </label>
                        <input type="text" name="question" class="form-control" value="" placeholder="Question" />
                    </div>
                    <div class="form-group">
                        <label> Answer : </label>
                        <input type="text" name="answer" class="form-control" value="" placeholder="Answer" />
                    </div>
                    <div class="buttonDelUp">
                        <?php if($modify==true){?>
                            <input type="submit" name="btn_edit" class="btn-save" value="Edit" />
                        <?php } else {?>
                            <input type="submit" name="btn_add" class="btn-save" value="Save" />
                        <?php } ?>
                    </div>
                </form>
            </div>
');