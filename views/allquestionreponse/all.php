<h3>Questions et réponses</h3>
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
            <td><a href="" class="Dbutton">Delete</a></td>
            <td><a href="" class="Ubutton">update</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>