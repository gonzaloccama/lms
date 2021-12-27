<?php

function getLoginRules()
{
	return array(
		array(
			'field' => 'email',
			'label' => 'Correo',
			'rules' => 'required|trim|valid_email',
			'errors' => array(
				'required' => 'El %s es requerido',
				'valid_email' => 'El campo es de tipo correo "@"',
			),
		),
		array(
			'field' => 'password',
			'label' => 'Contraseña',
			'rules' => 'required|trim',
			'errors' => array(
				'required' => 'La {field} es requerido',
			),
		)
	);
}

function getRegisterRules()
{
	return array(
		array(
			'field' => 'email',
			'label' => 'Correo',
			'rules' => 'required|trim|valid_email',
			'errors' => array(
				'required' => 'El {field} es obligatorio.',
				'valid_email' => 'El campo es de tipo correo "@".',
			),
		),
		array(
			'field' => 'password',
			'label' => 'Contraseña',
			'rules' => 'required|trim|min_length[8]',
			'errors' => array(
				'required' => 'La {field} es requerido.',
				'min_length' => 'El campo {field} debe como mínimo {param} caracteres de longitud.',
			),
		),
		array(
			'field' => 'dni',
			'label' => 'DNI',
			'rules' => 'required|trim|numeric|exact_length[8]',
			'errors' => array(
				'required' => 'El {field} es obligatorio.',
				'numeric' => 'El campo {field} solo admite números.',
				'exact_length' => 'El campo {field} debe tener exactamente {param} caracteres de longitud.',
			),
		),
		array(
			'field' => 'name',
			'label' => 'Nombres',
			'rules' => 'required|trim',
			'errors' => array(
				'required' => 'Los {field} son obligatorios.',
			),
		),
		array(
			'field' => 'first_parent',
			'label' => 'Apellido Paterno',
			'rules' => 'required|trim',
			'errors' => array(
				'required' => 'El {field} es obligatorio.',
			),
		),
		array(
			'field' => 'last_parent',
			'label' => 'Apellido Materno',
			'rules' => 'trim',
			'errors' => array(

			),
		),
		array(
			'field' => 'password_v',
			'label' => 'Validar contraseña',
			'rules' => 'required|trim',
			'errors' => array(
				'required' => '{field} es obligatorio.',
			),
		),
	);
}
