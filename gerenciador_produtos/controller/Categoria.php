<?php 

if(!isset($_SESSION)) {
	include '../process/validador.php';
}

class Categoria {

	private $id = null;
	private $name = null;
	private $code = null;
	private $status = null;

	public function __set($attribute, $value) {
		$this->$attribute = $value;
	}

	public function __get($attribute) {
		return $this->$attribute;
	}

	public function showCategories() {

		include '../process/conexao.php';

		$query="SELECT * FROM tb_categoria";

		$stmt = $conexao->query($query);
		$categorias = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$html = '';

		foreach($categorias as $cat) {
			if($cat['id_usuario'] == $_SESSION['id']) {

				$html .= '</tr>';
				$html .= '<tr class="data-row">';
				$html .= '<td class="data-grid-td">';
				$html .= '<span class="data-grid-cell-content">'.$cat['name'].'</span>';
				$html .= '</td>';

				$html .= '<td class="data-grid-td">';
				$html .= '<span class="data-grid-cell-content">'.$cat['code'].'</span>';
				$html .= '</td>';

				$html .= '<td class="data-grid-td">';
				$html .= '<div class="actions">';
				$html .= '<div class="action edit"><a href="editar-categoria?id='.$cat['id_categoria'].'"><span>Edit</span></a></div>';

				$html .= '<div class="action delete">';
				$html .= '<form action="../process/deletar/categoria.php" method="post">';
				$html .= '<input type="hidden" name="id_categoria" value="'.$cat['id_categoria'].'">';
				$html .= '<input type="submit" value="Delete" style="color: red; font-size: 1.5em;">';
				$html .= '</form>';
				$html .= '</div>';

				$html .= '</div>';
				$html .= '</td>';
				$html .= '</tr>';

			}
		}

		return $html;
	}

	public function showOption() {

		include '../process/conexao.php';

		$query="SELECT * FROM tb_categoria";

		$stmt = $conexao->query($query);
		$categorias = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$html = '';

		foreach($categorias as $cat) {
			if($cat['id_usuario'] == $_SESSION['id']) {

				$html .= '<option value="'.$cat['name'].'">'.$cat['name'].'</option>';

			}
		}

		return $html;
	}

	public function editCategory() {

		include '../process/conexao.php';

		$query="SELECT * FROM tb_categoria";

		$stmt = $conexao->query($query);
		$categorias = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$html = '';

		foreach($categorias as $cat) {
			if($cat['id_categoria'] == $_GET['id'] && $cat['id_usuario'] == $_SESSION['id']) {

				$html .= '<div class="input-field">';
				$html .= '<label class="label">Category Name</label>';
				$html .= '<input type="text" name="name" value="'.$cat['name'].'" class="input-text" />';
				$html .= '</div>';

				$html .= '<div class="input-field">';
				$html .= '<label class="label">Category Code</label>';
				$html .= '<input type="text" name="code" value="'.$cat['code'].'" class="input-text" />';
				$html .= '</div>';

			}
		}
		return $html;
	}
}

$categoria = new Categoria();








