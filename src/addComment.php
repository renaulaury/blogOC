<?php
if (isset($_POST['submit'])) {
    $title = input_post(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = input_post(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
