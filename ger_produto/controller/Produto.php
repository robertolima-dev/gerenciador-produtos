<?php 

if(!isset($_SESSION)) {
	include '../../ger_produto_Off/validador.php';
}

include 'Categoria.php';

class Produto {

	public $id = null;
	public $name = null;
	public $sku = null;
	public $price = null;
	public $quantity = null;
	public $category = null;
	public $description = null;
	public $status = null;

	public function __set($attribute, $value) {
		$this->$attribute = $value;
	}

	public function __get($attribute) {
		return $this->$attribute;
	}

	public function showProducts() {

		include '../../ger_produto_Off/conexao.php';

		$query="SELECT * FROM tb_produto";

		$stmt = $conexao->query($query);
		$produtos = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$html = '';

		foreach($produtos as $prod) {
			if($prod['id_usuario'] == $_SESSION['id']) {

				$html .= '<tr class="data-row">';
				$html .= '<td class="data-grid-td">';
				$html .= '<span class="data-grid-cell-content">'.$prod['name'].'</span>';
				$html .= '</td>';

				$html .= '<td class="data-grid-td">';
				$html .= '<span class="data-grid-cell-content">'.$prod['sku'].'</span>';
				$html .= '</td>';

				$html .= '<td class="data-grid-td">';
				$html .= '<span class="data-grid-cell-content">R$ '.number_format($prod['price'], 2, ',', '.').'</span>';
				$html .= '</td>';

				$html .= '<td class="data-grid-td">';
				$html .= '<span class="data-grid-cell-content">'.$prod['quantity'].'</span>';
				$html .= '</td>';

				$html .= '<td class="data-grid-td">';
				$html .= '<span class="data-grid-cell-content">'.$prod['category1'].'<Br />'.$prod['category2'].'</span>';
				$html .= '</td>';

				$html .= '<td class="data-grid-td">';
				$html .= '<div class="actions">';
				$html .= '<div class="action edit"><a href="editar-produto?id='.$prod['id_produto'].'"><span>Edit</span></a></div>';


				$html .= '<div class="action delete">';
				$html .= '<form action="../process/deletar/produto.php" method="post">';
				$html .= '<input type="hidden" name="id_produto" value="'.$prod['id_produto'].'">';
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

	public function editProduct() {

		include '../../ger_produto_Off/conexao.php';

		$query="SELECT * FROM tb_produto";

		$stmt = $conexao->query($query);
		$produtos = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$query="SELECT * FROM tb_categoria";

		$stmt = $conexao->query($query);
		$categorias = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$html = '';

		foreach($produtos as $prod) {
			if($prod['id_produto'] == $_GET['id'] && $prod['id_usuario'] == $_SESSION['id']) {

				$html .= '<div class="input-field">';
				$html .= '<label for="sku" class="label">Product SKU</label>';
				$html .= '<input type="text" name="sku" value="'.$prod['sku'].'" class="input-text" /> ';
				$html .= '</div>';
				$html .= '<div class="input-field">';
				$html .= '<label for="name" class="label">Product Name</label>';
				$html .= '<input type="text" name="name" value="'.$prod['name'].'" class="input-text" /> ';
				$html .= '</div>';
				$html .= '<div class="input-field">';
				$html .= '<label for="price" class="label">Price</label>';
				$html .= '<input type="text" name="price" value="'.$prod['price'].'" class="input-text" /> ';
				$html .= '</div>';
				$html .= '<div class="input-field">';
				$html .= '<label for="quantity" class="label">Quantity</label>';
				$html .= '<input type="text" name="quantity" value="'.$prod['quantity'].'" class="input-text" /> ';
				$html .= '</div>';
				$html .= '<div class="input-field">';

				$html .= '<label class="label">Categories</label>';
				$html .= '<select multiple name="category1" class="input-text">';

				foreach($categorias as $cat) {
					if($cat['id_usuario'] == $_SESSION['id']) {
						$html .= '<option value="'.$cat['name'].'">'.$cat['name'].'</option>';
					}
				}

				$html .= '</select>';
				$html .= '</div>';
				$html .= '<div class="input-field">';
				$html .= '<label class="label">Categories</label>';
				$html .= '<select multiple name="category2" class="input-text">';

				foreach($categorias as $cat) {
					if($cat['id_usuario'] == $_SESSION['id']) {
						$html .= '<option value="'.$cat['name'].'">'.$cat['name'].'</option>';
					}
				}

				$html .= '</select>';
				$html .= '</div>';
				$html .= '<div class="input-field">';
				$html .= '<label for="description" class="label">Description</label>';
				$html .= '<textarea name="description" class="input-text">'.$prod['description'].'</textarea>';
				$html .= '</div>';

				$html .= '<div class="input-field" style="margin-left: 140px;">';
				$html .= '<label class="custom-file-label">Product Image</label>';
				$html .= '<input class="input-text" type="file" name="upload_file" value="'.$prod['photo'].'">';
				$html .= '</div>';

				$html .= '<input type="hidden" name="MAX_FILE_SIZE" value="1000000">';

				$html .= '<input type="hidden" name="id_produto" value="'.$prod['id_produto'].'">';

				$html .= '<div class="actions-form">';
				$html .= '<a href="products.html" class="action back">Back</a>';
				$html .= '<input class="btn-submit btn-action" type="submit" value="Edit Product" />';
				$html .= '</div>';

			}
		}
		return $html;
	}

	public function showDashboard() {

		$id = $_SESSION['id'];
		//print_r($user);

		include '../../ger_produto_Off/conexao.php';

		$query="SELECT COUNT(id_produto) FROM tb_produto WHERE id_usuario='$id'";

		$stmt = $conexao->query($query);
		$totalDeProdutos = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$numProdutocts = $totalDeProdutos[0]['COUNT(id_produto)'];


		$query="SELECT * FROM tb_produto";

		$stmt = $conexao->query($query);
		$produtos = $stmt->FetchAll(PDO::FETCH_ASSOC);

		$html = '';

		$html .= '<div class="infor">';
		$html .= 'You have '.$numProdutocts.' products added on this store: <a href="cadastrar-produto" class="btn-action">Add new Product</a>';
		$html .= '</div>';
		$html .= '<ul class="product-list">';

		foreach($produtos as $prod) {
			if($prod['id_usuario'] == $_SESSION['id']) {


				$html .= '<li style="margin-top: 50px;">';
				$html .= '<div class="product-image">';
				$html .= '<a href="produtos">';
				if($prod['photo'] != '') {
					$html .= '<img src="../upload/'.$prod['photo'].'" layout="responsive" width="164" height="145" alt="'.$prod['name'].'" />';
				} else {
					$html .= '<img src="../images/semFoto.jpg" layout="responsive" width="164" height="145" />';
				}
				$html .= '</a>';
				$html .= '</div>';
				$html .= '<div class="product-info">';
				$html .= '<div class="product-name"><span>'.$prod['name'].'</span></div>';
				$html .= '<div class="product-price"><span class="special-price">'.$prod['quantity'].' available</span> <span>R$ '.number_format($prod['price'], 2, ',' , '.').'</span></div>';
				$html .= '</div>';
				$html .= '</li>';

			}
		}

		$html .= '</ul>';

		return $html;
	}
}

$produto = new Produto();





