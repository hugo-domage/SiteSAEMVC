<?php
$this->_t = 'Question et Reponse'; ?>
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
    <?php foreach ($questions as $question ): ?>
    <tr>
        <td><?= $question->question() ?></td>
        <td><?= $question->reponse() ?></td>
        <td><?= $question -> id()?></td>
        <td><?= $question -> qcm()?></td>
        <td><?= $question -> type_question()?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
