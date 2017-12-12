<?php

require_once(__DIR__.'/data.php');
require_once(__DIR__.'/index.php');

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<title>Тестовое задание для Мирафокс (Сравнение команд)</title>
	</head>

	<body>
		<table border="1">
			<tr>
				<th>Команды</th>
				<th>Вероятность исхода (в голах)</th>
				<th>Победа</th>
			</tr>

		<?php foreach($data as $i=> $c1) {
			foreach($data as $j=> $c2) {
				if ($i == $j) {
					continue;
				}

				$result = match($i, $j);

				$win = $result[0] > $result[1];
				$fail = $result[0] < $result[1];
				$def = $result[0] == $result[1];

				?>

				<tr>
					<td><?php echo $c1['name'] . ' - ' . $c2['name'];?></td>
					<td><?php echo $result[0] . ' - ' .  $result[1];?></td>
					<td
						<?php if ($win) {
							echo 'style="background-color:green;"';
						} elseif ($fail) {
							echo 'style="background-color:red;"';
						} else {
							echo 'style="background-color:gray;"';
						}?>
					>&nbsp;</td>
				</tr>
		<?php }

			echo "<th><td colspan='3'>&nbsp;</td></th>";
		} ?>
		</table>
	</body>
</html>
