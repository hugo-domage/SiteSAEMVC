<h3>Questions et réponses</h3>
<label><a href="/addquestionreponse"><b>Ajouter une question</b></a></label>
<table>
    <thead>
    <tr>
        <th> Numero de question</th>
        <th> Question</th>
        <th> Reponse</th>
        <th> QCM</th>
        <th> type_question</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($A_view as $question ): ?>
        <tr>
            <td><?= $question['id']?></td>
            <td><?= $question['question']?></td>
            <td><?= $question['reponse']?></td>
            <td><?= $question['qcm']?></td>
            <td><?= $question['type_question']?></td>
            <td><a href="/deletequestionreponse/delete/<?= $question['id']?>" class="Dbutton">Delete</a></td>
            <td><a href="/updatequestionreponse/display/<?= $question['id']?>" class="Ubutton">update</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>