<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = WATER_REVIEWS_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = WATER_REVIEWS_PLUGIN_ADMIN_URL . '&action=edit';

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> менеджера</h1>
	<a href="<?= WATER_REVIEWS_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$model->id ?>" >
		<?php endif ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="name">Имя</label>
					</th>
					<td>
						<input name="data_name" type="text" id="name" value="<?= self::$model->name ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="last_name">Фамилия</label>
					</th>
					<td>
						<input name="data_last_name" type="text" id="last_name" value="<?= self::$model->last_name?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="date">Дата</label>
					</th>
					<td>
						<input name="data_date" type="text" id="date" value="<?= self::$model->date ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="schema_date">Дата публикации</label>
					</th>
					<td>
						<input name="data_schema_date" type="date" class="regular-text" id="schema_date" min="2020-01-01">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="text">Текст</label>
					</th>
					<td>
						<textarea name="data_text" type="text" id="text" class="regular-text"><?= self::$model->text ?></textarea>
					</td>
				</tr>	
								
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>