<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuenta_model extends CI_Model {

    //Usuario
	public $id_usuario;
	public $cuenta;


	
	/**
     * Gets the value of id_usuario.
     *
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Sets the value of id_usuario.
     *
     * @param mixed $id_usuario the id usuario
     *
     * @return self
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Gets the value of cuenta.
     *
     * @return mixed
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Sets the value of cuenta.
     *
     * @param mixed $cuenta the cuenta
     *
     * @return self
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;

        return $this;
    }


	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();

		$this->load->library('Coinbase');
	}


    public function agregar()
    {
    	$total_a_pagar = $this->coinbase->usdToBtc(55);

        $data = array(
           'id_usuario' => $this->id_usuario,
           'usuario_codigo' => $this->cuenta,
           'total_a_pagar' => $total_a_pagar
        );

        $query = $this->db->insert('coinbase_invoice',$data); 

        if($query)
        {
           	return TRUE;
        }
        else
        {
            return FALSE;
        }   
    }

    public function agregarCuentaAlSistema($id_usuario,$cuenta)
    {

        $data = array(
           'id_usuario' => $id_usuario,
           'usuario_codigo' => $cuenta
        );

        $query = $this->db->insert('usuarios_cuentas',$data); 

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }   
    }

    public function listaCuentas($id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);

        $query_cycle = $this->db->get('coinbase_invoice');

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle)
            {
                $list_cycles_active[] = $cycle;
            }

            return $list_cycles_active;
        }

        return NULL;
    }

    public function cantidadReferidosUsuario($id_usuario)
    {
        $contador = 0;

        $this->db->where('id_usuario',$id_usuario);

        $query_cuenta = $this->db->get('usuarios_cuentas');

        if($query_cuenta->num_rows() > 0)
        {
            foreach ($query_cuenta->result() as $cuenta)
            {
                $contador = $contador + $this->cantidadReferidosCodigo($cuenta->usuario_codigo);
            }

        }

        return $contador;
    }

    public function cantidadReferidosCodigo($codigo)
    {
        $contador = 0;

        $this->db->where('referido_por',$codigo);

        $query_cycle = $this->db->get('referidos_directos');

        if($query_cycle->num_rows() > 0)
        {
            foreach ($query_cycle->result() as $cycle)
            {
                $contador++;
            }
        }

        return $contador;

    }

    public function obtenerCuenta($cuenta)
    {
        $this->db->where('usuario_codigo',strtoupper($cuenta));
        $this->db->join('niveles', 'usuarios_cuentas.nivel = niveles.id_nivel', 'left');

        $query_cuenta = $this->db->get('usuarios_cuentas');

        if($query_cuenta->num_rows() > 0)
        {
            foreach ($query_cuenta->result() as $cuenta)
            {
                return $cuenta;
            }
        }

        return FALSE;

    }

    public function subirNivel($cuenta)
    {
        $nivel = $this->obtenerCuenta($cuenta)->nivel + 1;

        if($nivel >= 5)
        {
            return TRUE;
        }

        $id = array('usuario_codigo' => strtoupper($cuenta));

        $data = array(
        'nivel' => $nivel,
        );

        $update = $this->db->update('usuarios_cuentas', $data, $id);

        if($update)
        {
            return TRUE;
        }

        return FALSE;
    }

    public function asignarReferido($cuenta,$referido_por)
    {
        $data = array(
           'usuario_codigo' => $cuenta,
           'referido_por' => $referido_por
        );

        $query = $this->db->insert('referidos_directos',$data); 

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


    public function acumuladoCuenta($cuenta_base,$nivel)
    {

        $acumulador = 0;

        $this->db->where('para',strtoupper($cuenta_base));
        $this->db->where('nivel',$nivel);

        $query_cuenta = $this->db->get('transacciones');

        if($query_cuenta->num_rows() > 0)
        {
            foreach ($query_cuenta->result() as $cuenta)
            {
                $acumulador = $acumulador + $cuenta->monto;
            }
        }

        /*$this->db->where('de',strtoupper($cuenta_base));

        $query_cuenta = $this->db->get('transacciones');

        if($query_cuenta->num_rows() > 0)
        {
            foreach ($query_cuenta->result() as $cuenta)
            {
                if((int) $cuenta->monto == 50)
                {
                    continue;
                }
                else
                {
                    $acumulador = $acumulador - (int) $cuenta->monto;
                }
                
            }
        }*/

        return $acumulador;
    }


    public function acumuladoCuentaReciclo($cuenta_base,$nivel)
    {

        $acumulador = 0;

        $this->db->where('para',strtoupper($cuenta_base));
        $this->db->where('nivel',$nivel);

        $query_cuenta = $this->db->get('transacciones_reciclo');

        if($query_cuenta->num_rows() > 0)
        {
            foreach ($query_cuenta->result() as $cuenta)
            {
                $acumulador = $acumulador + $cuenta->monto;
            }
        }

        /*$this->db->where('de',strtoupper($cuenta_base));

        $query_cuenta = $this->db->get('transacciones');

        if($query_cuenta->num_rows() > 0)
        {
            foreach ($query_cuenta->result() as $cuenta)
            {
                if((int) $cuenta->monto == 50)
                {
                    continue;
                }
                else
                {
                    $acumulador = $acumulador - (int) $cuenta->monto;
                }
                
            }
        }*/

        return $acumulador;
    }

    public function realizarTransaccion($de,$para,$monto,$nivel,$razon = 'Desconocida')
    {
        $data = array(
           'de' => $de,
           'para' => $para,
           'monto' => $monto,
           'nivel' => $nivel,
           'razon' => $razon
        );

        $query = $this->db->insert('transacciones',$data); 

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function realizarTransaccionReciclo($de,$para,$monto,$nivel,$razon = 'Desconocida')
    {
        $data = array(
           'de' => $de,
           'para' => $para,
           'monto' => $monto,
           'nivel' => $nivel,
           'razon' => $razon
        );

        $query = $this->db->insert('transacciones_reciclo',$data); 

        if($query)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function obtenerNivel($nivel)
    {
        $this->db->where('id_nivel',$nivel);

        $query_nivel = $this->db->get('niveles');

        if($query_nivel->num_rows() > 0)
        {
            foreach ($query_nivel->result() as $nivel)
            {
                return $nivel;
            }
        }

        return FALSE;
    }

    public function darGanancias($para,$monto,$razon)
    {
        
        $data = array(
           'para' => $para,
           'monto' => $monto,
           'razon' => $razon
        );

        $query = $this->db->insert('ganancias',$data); 

        if($query)
        {
            $id_ganancia = $this->db->insert_id();
            return $id_ganancia;
        }
        else
        {
            return FALSE;
        }
    }

    public function listaCuentasActivas($id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);

        $query_cuentas = $this->db->get('usuarios_cuentas');

        $lista_cuentas = NULL;

        if($query_cuentas->num_rows() > 0)
        {
            foreach ($query_cuentas->result() as $cuenta)
            {
                $lista_cuentas[$cuenta->id_cuenta]['info'] = $cuenta;

                $this->db->where('para',$cuenta->usuario_codigo);

                $query_ganancias = $this->db->get('ganancias');

                $lista_cuentas[$cuenta->id_cuenta]['ganancias'] = NULL;

                if($query_ganancias->num_rows() > 0)
                {
                    foreach ($query_ganancias->result() as $ganancia)
                    {
                        $lista_cuentas[$cuenta->id_cuenta]['ganancias'][] = $ganancia;
                    }
                }



                $this->db->where('de',$cuenta->usuario_codigo);

                $query_transacciones = $this->db->get('transacciones');

                $lista_cuentas[$cuenta->id_cuenta]['transacciones'] = NULL;

                if($query_transacciones->num_rows() > 0)
                {
                    foreach ($query_transacciones->result() as $transaccion)
                    {
                        $lista_cuentas[$cuenta->id_cuenta]['transacciones'][] = $transaccion;
                    }
                }
            }
        }

        return $lista_cuentas;
    }


    /*public function listaCuentasActivas($id_usuario)
    {
        $lista_cuentas = NULL;

        $this->db->where('id_usuario',$id_usuario);
        $this->db->join('niveles', 'usuarios_cuentas.nivel = niveles.id_nivel', 'left');

        $query_cuenta = $this->db->get('usuarios_cuentas');

        if($query_cuenta->num_rows() > 0)
        {
            foreach ($query_cuenta->result() as $cuenta)
            {
                $lista_cuentas[] = $cuenta;
            }
        }

        return $lista_cuentas;

    }*/


    public function buscarGananciasFaltantes()
    {
        $query_cuentas = $this->db->get('usuarios_cuentas');

        if($query_cuentas->num_rows() > 0)
        {
            foreach ($query_cuentas->result() as $cuenta)
            {
                if($cuenta->nivel >= 3)
                {
                    $nivel = $this->obtenerNivel($cuenta->nivel);

                    $this->db->where('para', $cuenta->usuario_codigo);

                    $this->db->where('nivel', $cuenta->nivel);

                    $query_transacciones = $this->db->get('transacciones');

                    echo $cuenta->usuario_codigo." : <br>";

                    if($query_transacciones->num_rows() > 0)
                    {
                        foreach ($query_transacciones->result() as $transaccion)
                        { 
                            
                            echo "Transaccion (Nº ".$cuenta->nivel.") : <br> ".$transaccion->monto."<br>";
                            $menos_pago_nivel = $transaccion->monto - ($nivel->pago_proximo_nivel / $nivel->n_personas);

                            echo "Entonces le toca menos el pago del nivel : ".$menos_pago_nivel."<br>";

                            $menos_porcentaje = $menos_pago_nivel - ((10 / 100)*$menos_pago_nivel);
                            echo "Entonces le toca menos 10% : ".$menos_porcentaje."<br>";
                            /*$entre_personas = $menos_porcentaje / $nivel->n_personas;
                            echo "Y lo verdadero que les toca, entre las ".$nivel->n_personas." personas es : ".$entre_personas."<br>";*/

                        }
                    }

                    echo "<br><hr><br>";
                }
            }
        }
                






    }








    
}
?>