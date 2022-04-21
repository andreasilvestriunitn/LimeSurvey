<?php
    // Tools dropdown button
    $toolsDropdownItems = $this->render('includes/questionToolsDropdownItems', get_defined_vars(), true);
?>
<?php if (!empty(trim($toolsDropdownItems))): ?>
    <!-- Tools  -->
    <div class="btn-group hidden-xs">

        <!-- Main button dropdown -->
        <button id="ls-question-tools-button" role="button" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="icon-tools" ></span>
            <?php eT('Tools'); ?>&nbsp;<span class="caret"></span>
        </button>

        <!-- dropdown -->
        <ul class="dropdown-menu">
            <?= $toolsDropdownItems ?>
        </ul>
    </div>
<?php endif; ?>

<?php
/**
 * Include the Survey Preview and Group Preview buttons
 */
$this->render('includes/previewSurveyAndGroupButtons_view', get_defined_vars());
?>

<?php if($hasSurveyContentUpdatePermission): ?>
    <?php if (count($surveyLanguages) > 1): ?>
        <!-- Preview question multilanguage -->
        <div class="btn-group">
            <button type="button" role="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fa fa-eye"></span>
                <?php eT("Preview question"); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" style="min-width : 252px;">
                <?php foreach ($surveyLanguages as $languageCode => $languageName): ?>
                    <li>
                        <a target="_blank" href="<?php echo Yii::App()->createUrl("survey/index/action/previewquestion/sid/{$surveyid}/gid/{$gid}/qid/{$qid}/lang/{$languageCode}"); ?>" >
                            <?php echo $languageName; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else:?>
        <!-- Preview question single language -->
        <button class="btn btn-outline-secondary" role="button" href="<?php echo Yii::App()->createUrl("survey/index/action/previewquestion/sid/$surveyid/gid/$gid/qid/$qid"); ?>" role="button" target="_blank">
            <span class="fa fa-eye"></span>
            <?php eT("Preview question");?>
        </button>
    <?php endif; ?>
<?php endif; ?>
