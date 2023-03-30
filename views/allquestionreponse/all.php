<body class="all-body">
    <h3 class="all-title">Questions et réponses</h3>
    <label class="all-label"><a href="/addquestionreponse"><b>Ajouter une question</b></a></label>
    <table class="all-tableau">
        <thead class="all-thead">
        <tr class="all-tr">
            <th> Numero de question</th>
            <th> Question</th>
            <th> Reponse</th>
            <th> QCM</th>
            <th> type_question</th>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($A_view as $question ): ?>
            <tr class="all-tr">
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
</body>