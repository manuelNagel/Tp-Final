<?php

class abmProducto
{

    public function abm($datos)
    {
        $resp = false;
        if ($datos['action'] == 'eliminar') {
            if ($this->baja($datos)) {
                $resp = true;
            }
        }
        if ($datos['action'] == 'modificar') {
            if ($this->modificacion($datos)) {
                $resp = true;
            }
        }
        if ($datos['action'] == 'alta') {
            if ($this->alta($datos)) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return producto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (
            array_key_exists('idproducto', $param) &&
            array_key_exists('pronombre', $param) &&
            array_key_exists('prodetalle', $param) &&
            array_key_exists('procantstock', $param) &&
            array_key_exists('precio', $param) &&
            array_key_exists('prodeshabilitado', $param) &&
            array_key_exists('imagen', $param)
        ) {
            $obj = new producto();
            $obj->setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock'], $param['precio'], $param['prodeshabilitado'], $param['imagen']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return producto
     */
    private function cargarObjetoSinID($param)
    {
        $obj = null;
        if (
            array_key_exists('pronombre', $param) &&
            array_key_exists('prodetalle', $param) &&
            array_key_exists('procantstock', $param) &&
            array_key_exists('precio', $param) &&
            array_key_exists('prodeshabilitado', $param) &&
            array_key_exists('imagen', $param)
        ) {
            $obj = new producto();
            $obj->setearSinID($param['pronombre'], $param['prodetalle'], $param['procantstock'], $param['precio'], $param['prodeshabilitado'], $param['imagen']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return producto
     */
    private function cargarObjetoConClave($param)
    {
        $producto = null;
        if (isset($param['idproducto'])) {
            $producto = new producto();
            $producto->setear($param['idproducto'], null, null, null, null, null, null);
        }
        return $producto;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idproducto'])) {
            $resp = true;
        }
        return $resp;
    }

    /**
     *
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;

        $objProducto = $this->cargarObjeto($param);
        if ($objProducto != null and $objProducto->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /**
     *
     * @param array $param
     */
    public function altaSinID($param)
    {
        $resp = false;

        $objProducto = $this->cargarObjetoSinID($param);
        if ($objProducto != null and $objProducto->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objProducto = $this->cargarObjetoConClave($param);
            if ($objProducto != null and $objProducto->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objProducto = $this->cargarObjeto($param);
            if ($objProducto != null and $objProducto->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> null) {
            if (isset($param['idproducto'])) {
                $where .= " and idproducto ='" . $param['idproducto'] . "'";
            }
            if (isset($param['pronombre'])) {
                $where .= " and pronombre ='" . $param['pronombre'] . "'";
            }
            if (isset($param['prodetalle'])) {
                $where .= " and prodetalle ='" . $param['prodetalle'] . "'";
            }
            if (isset($param['procantstock'])) {
                $where .= " and procantstock ='" . $param['procantstock'] . "'";
            }
            if (isset($param['precio'])) {
                $where .= " and precio ='" . $param['precio'] . "'";
            }
            if (isset($param['prodeshabilitado'])) {
                $where .= " and prodeshabilitado ='" . $param['prodeshabilitado'] . "'";
            }
            if (isset($param['imagen'])) {
                $where .= " and imagen ='" . $param['imagen'] . "'";
            }
        }

        $objProducto = new producto();
        $arreglo = $objProducto->listar($where);
        return $arreglo;
    }

    public function buscarConStock()
    {
        $arreglo = [];
        $objProducto = new producto();
        $arreglo = $objProducto->listar('procantstock > 0');
        return $arreglo;
    }

    public function deshabilitarProducto($datos)
    {
        $resp = false;
        if (!empty($datos)) {
            $objPro = $this->buscar(['idproducto' => $datos['idproducto']]);
            $fecha = null;
            if ($datos['accion'] == "deshabilitar") {
                date_default_timezone_set('America/Argentina/Buenos_Aires');
                $fecha = date('Y-m-d H:i:s');
            }

            $objPro[0]->setProDeshabilitado($fecha);
            if ($objPro[0]->modificar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    public function listarProductos($datos)
    {
        $arreglo = [];
        $list = $this->buscar($datos);
        if (count($list) > 0) {
            foreach ($list as $elem) {
                $nuevoElem = [
                    "idproducto" => $elem->getID(),
                    "pronombre" => $elem->getProNombre(),
                    "prodetalle" => $elem->getProDetalle(),
                    "procantstock" => $elem->getProCantStock(),
                    "precio" => $elem->getPrecio(),
                    "deshabilitado" => $elem->getProDeshabilitado(),
                    "imagen" => $elem->getImagen()
                ];
                array_push($arreglo, $nuevoElem);
            }
        }

        return $arreglo;
    }
}
