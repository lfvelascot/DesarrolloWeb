-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2020 a las 23:56:27
-- Versión del servidor: 5.7.31-log
-- Versión de PHP: 7.4.10

create user 'appausa_user'@'%' identified by 'appausa2020';
CREATE SCHEMA IF NOT EXISTS `appausadb` DEFAULT CHARACTER SET utf8 ;
grant all privileges on appausadb.* to 'appausa_user'@'%';
USE `appausadb` ;

--
-- Base de datos: `appausadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion`
--

CREATE TABLE `accion` (
  `nombre` varchar(45) NOT NULL,
  `descrip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `accion`
--

INSERT INTO `accion` (`nombre`, `descrip`) VALUES
('Actividad Asignada Ex', 'Actividad Asignada'),
('Actividad Asignada Fal', 'Actividad Asignada'),
('Actividad Desasignada Ex', 'Actividad Desasignada'),
('Actividad Desasignada Fal', 'Actividad Desasignada'),
('Cambio de Contraseña Exitoso', 'Cambio de Contraseña Exitoso'),
('Cambio de Contraseña Fallido', 'Cambio de Contraseña Fallido'),
('CEntEmp Eliminado Exitoso', 'CEntEmp Eliminado Exitoso'),
('CEntEmp Eliminado Fallido', 'CEntEmp Eliminado Fallido'),
('CEntEmp Modificado Exitoso', 'CEntEmp Modificado Exitoso'),
('CEntEmp Modificado Fallido', 'CEntEmp Modificado Fallido'),
('Comentarios Vistos', 'Comentarios Vistos'),
('Contrato Añadido Exitoso', 'Contrato Añadido Exitoso'),
('Contrato Añadido Fallido', 'Contrato Añadido Fallido'),
('Contrato Buscado', 'Contrato Buscado'),
('Contrato Eliminado Exitoso', 'Contrato Eliminado Exitoso'),
('Contrato Eliminado Fallido', 'Contrato Eliminado Fallido'),
('Contrato Entidad Exitoso', 'Contrato Entidad Exitoso'),
('Contrato Entidad Fallido', 'Contrato Entidad Fallido'),
('Contrato Modificado Exitoso', 'Contrato Modificado Exitoso'),
('Contrato Modificado Fallido', 'Contrato Modificado Fallido'),
('Contratos Vistos', 'Contratos Vistos'),
('Cuenta Añadido Exitoso', 'Cuenta Añadido Exitoso'),
('Cuenta Añadido Fallido', 'Cuenta Añadido Fallido'),
('Cuenta Buscado', 'Cuenta Buscado'),
('Cuenta Eliminado Exitoso', 'Cuenta Eliminado Exitoso'),
('Cuenta Eliminado Fallido', 'Cuenta Eliminado Fallido'),
('Cuenta Modificado Exitoso', 'Cuenta Modificado Exitoso'),
('Cuenta Modificado Fallido', 'Cuenta Modificado Fallido'),
('Cuentas Vistas', 'Cuentas Vistas'),
('Empleado Añadido Exitoso', 'Empleado Añadido Exitoso'),
('Empleado Añadido Fallido', 'Empleado Añadido Fallido'),
('Empleado Buscado', 'Empleado Buscado'),
('Empleado Eliminado Exitoso', 'Empleado Eliminado Exitoso'),
('Empleado Eliminado Fallido', 'Empleado Eliminado Fallido'),
('Empleado Modificado Exitoso', 'Empleado Modificado Exitoso'),
('Empleado Modificado Fallido', 'Empleado Modificado Fallido'),
('Empleados Vistos', 'Empleados Vistos'),
('Empresa Añadida Exitoso', 'Empresa Añadida Exitoso'),
('Empresa Añadida Fallido', 'Empresa Añadida Fallido'),
('Empresa Buscada', 'Empresa Buscada'),
('Empresa Eliminada Exitoso', 'Empresa Eliminada Exitoso'),
('Empresa Eliminada Fallido', 'Empresa Eliminada Fallido'),
('Empresa Modificada Exitoso', 'Empresa Modificada Exitoso'),
('Empresa Modificada Fallido', 'Empresa Modificada Fallido'),
('Empresas Vistas', 'Empresa Vistas'),
('Entidad Añadida Exitoso', 'Entidad Añadida Exitoso'),
('Entidad Añadida Fallido', 'Entidad Añadida Fallido'),
('Entidad Buscada', 'Entidad Buscada'),
('Entidad Eliminada Exitoso', 'Entidad Eliminada Exitoso'),
('Entidad Eliminada Fallido', 'Entidad Eliminada Fallido'),
('Entidad Modificada Exitoso', 'Entidad Modificada Exitoso'),
('Entidad Modificada Fallido', 'Entidad Modificada Fallido'),
('Entidades Vistas', 'Entidades Vistas'),
('Estado Cuenta Cambiado', 'Estado Cuenta Cambiado'),
('Estado Cuenta NO Cambiado', 'Estado Cuenta NO Cambiado'),
('Fin Sesión', 'Fin Sesión'),
('Ingreso a la Aplicación', 'Ingreso a la Aplicación'),
('Ingreso Fallido', 'Ingreso Fallido'),
('Nuevo TH Asignado', 'Nuevo TH Asignado'),
('Perfil Añadido Exitoso', 'Perfil Añadido Exitoso'),
('Perfil Añadido Fallido', 'Perfil Añadido Fallido'),
('Perfil Asignado Exitoso', 'Perfil Asignado Exitoso'),
('Perfil Asignado Fallido', 'Perfil Asignado Fallido'),
('Perfil Buscado', 'Perfil Buscado'),
('Perfil Eliminado Exitoso', 'Perfil Eliminado Exitoso'),
('Perfil Eliminado Fallido', 'Perfil Eliminado Fallido'),
('Perfil Modificado Exitoso', 'Perfil Modificado Exitoso'),
('Perfil Modificado Fallido', 'Perfil Modificado Fallido'),
('Perfiles Vistos', 'Perfiles Vistos'),
('Registro de Actividad Visto', 'Log del usuario visto'),
('Reporte Actividad Generado', 'El usuario genero un reporte'),
('Seguridad Social Vista', 'Seguridad Social Vista'),
('TH Requerido', 'TH Requerido'),
('Usuario Añadido Exitoso', 'Usuario Añadido Exitoso'),
('Usuario Añadido Fallido', 'Usuario Añadido Fallido'),
('Usuario Buscado', 'Usuario Buscado'),
('Usuario Eliminado Exitoso', 'Usuario Eliminado Exitoso'),
('Usuario Eliminado Fallido', 'Usuario Eliminado Fallido'),
('Usuario Modificado Exitoso', 'Usuario Modificado Exitoso'),
('Usuario Modificado Fallido', 'Usuario Modificado Fallido'),
('Usuarios Vistos', 'Usuarios Vistos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `nombre` varchar(45) NOT NULL,
  `elemento` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`nombre`, `elemento`, `url`) VALUES
('Añadir Contrato', 'Contratos', 'anadirContrato.php'),
('Añadir Cuenta', 'Cuentas', 'anadirCuenta.php'),
('Añadir Empleado', 'Empleados', 'anadirEmpleado.php'),
('Añadir Empresa', 'Empresas', 'anadirEmpresa.php'),
('Añadir Entidad', 'Entidades', 'anadirEntidad.php'),
('Añadir Perfil', 'Perfiles', 'anadirPerfil.php'),
('Añadir Usuario', 'Usuarios', 'anadirUsuario.php'),
('Asignar Cuenta Talento Humano', 'Cuentas', 'asignarCuentaTH.php'),
('Asignar Perfil', 'Perfiles', 'asignarPerfil.php'),
('Buscar Contrato', 'Contratos', 'buscarContrato.php'),
('Buscar Contrato por Empresa', 'Contratos', 'buscarContratosEmpr.php'),
('Buscar Cuenta', 'Cuentas', 'buscarCuenta.php'),
('Buscar Empleado', 'Empleados', 'buscarEmpleado.php'),
('Buscar Empresa', 'Empresas', 'buscarEmpresa.php'),
('Buscar Entidad', 'Entidades', 'buscarEntidad.php'),
('Buscar Perfil', 'Perfiles', 'buscarPerfil.php'),
('Buscar Usuario', 'Usuarios', 'buscarUsuario.php'),
('Cambiar Contraseña Cuenta', 'Cuentas', 'cambiarContrasena.php'),
('Cambiar Estado Cuenta', 'Cuentas', 'cambiarEstadoCuenta.php'),
('Cambiar Perfil Cuenta', 'Cuentas', 'cambiarPerfilCuenta.php'),
('Cerrar Sesión', 'Sesión', 'logout.php'),
('Crear Contrato', 'Contratos', 'anadirContratoE.php'),
('Eliminar Contrato', 'Contratos', 'eliminarContrato.php'),
('Eliminar Cuenta', 'Cuentas', 'eliminarCuenta.php'),
('Eliminar Empleado', 'Empleados', 'eliminarEmpleado.php'),
('Eliminar Empresa', 'Empresas', 'eliminarEmpresa.php'),
('Eliminar Entidad', 'Entidades', 'eliminarEntidad.php'),
('Eliminar Perfil', 'Perfiles', 'eliminarPerfil.php'),
('Eliminar Usuario', 'Usuarios', 'eliminarUsuario.php'),
('Generar Reporte', 'Reportes', 'generarReporte.php'),
('Modificar Contrato', 'Contratos', 'modificarContrato.php'),
('Modificar Cuenta', 'Cuentas', 'modificarCuenta.php'),
('Modificar Empleado', 'Empleados', 'modificarEmpleado.php'),
('Modificar Empresa', 'Empresas', 'modificarEmpresa.php'),
('Modificar Entidad', 'Entidades', 'modificarEntidad.php'),
('Modificar Perfil', 'Perfiles', 'modificarPerfil.php'),
('Modificar Usuario', 'Usuarios', 'modificarUsuario.php'),
('Necesito Ayuda', 'Ayuda', 'verAyuda.html'),
('Solicitar Cuenta Talento Humano', 'Empleados', 'solicitarTHEmpleado.php'),
('Ver Comentarios', 'Ayuda', 'verComentarios.php'),
('Ver Datos Cuenta', 'Sesión', 'verDatosUsuario.php'),
('Ver Todas las Cuentas', 'Cuentas', 'verCuentas.php'),
('Ver Todas las Entidades', 'Entidades', 'verEntidades.php'),
('Ver Todos las Empresas', 'Empresas', 'verEmpresas.php'),
('Ver Todos los Contratos', 'Contratos', 'verContratos.php'),
('Ver Todos los Empleados', 'Empleados', 'verEmpleados.php'),
('Ver Todos los Perfiles', 'Perfiles', 'verPerfiles.php'),
('Ver Todos los Usuarios', 'Usuarios', 'verUsuarios.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasena_restablecida`
--

CREATE TABLE `contrasena_restablecida` (
  `fecha` date NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `cuenta` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `num_contrato` bigint(20) NOT NULL,
  `empleado` bigint(10) NOT NULL,
  `empresa` bigint(17) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `sueldo` bigint(10) NOT NULL,
  `funciones` text NOT NULL,
  `arl` bigint(17) DEFAULT NULL,
  `caja_compensación` bigint(17) DEFAULT NULL,
  `fondo_pensiones` bigint(17) DEFAULT NULL,
  `eps` bigint(17) DEFAULT NULL,
  `tipo_contrato` varchar(45) DEFAULT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`num_contrato`, `empleado`, `empresa`, `cargo`, `fecha_inicio`, `fecha_fin`, `sueldo`, `funciones`, `arl`, `caja_compensación`, `fondo_pensiones`, `eps`, `tipo_contrato`, `e`) VALUES
(1, 1000373689, 124578964, 'Profesor TC', '2020-05-13', '2021-03-18', 1200000, 'tgfrfggggfgdfdf', 1010254335, 1010297314, 1010254399, 1010254314, 'Definido', 1),
(2, 365145, 1, 'TH', '2020-10-10', '2020-10-31', 1200000, 'xrtfgdgffgf', 1010254399, 1010254314, 1010254314, 1010297314, 'Definido', 1),
(3, 54, 1, 'Asistente', '2020-10-11', '2021-10-11', 132000, 'yhhfgfggfgggf', 1010254335, 1010297314, 1010254399, 1010254314, 'Definido', 1),
(5, 36, 1, 'Talento Humano', '2020-10-12', '2021-10-12', 1200000, 'xxxxxxxxxxxxxyyyyyyyyyyyyyyyyyyyyyyyyy', 1010254335, 1010297314, 1010254399, 1010254314, 'Definido', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `correo_electronico` varchar(150) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `usuario` bigint(10) NOT NULL,
  `e` int(1) NOT NULL,
  `intentos_fallidos` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`correo_electronico`, `contrasena`, `estado`, `perfil`, `usuario`, `e`, `intentos_fallidos`) VALUES
('bIxYd39s/MP5gF3uFF/8FCK+fDKUplHKiJQDYQ1WmmY=', 'hQKyNFqM3nqXmyZZ+mYDxg==', 'ACTIVA', 'ADMINISTRADOR', 18, 1, 0),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 'tQF24cTDyx4T7n3ZvApfbg==', 'ACTIVA', 'ADMINISTRADOR', 1000689373, 1, 0),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', 'tQF24cTDyx4T7n3ZvApfbg==', 'ACTIVA', 'TALENTO HUMANO GENERAL', 365145, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE `elemento` (
  `nombre` varchar(45) NOT NULL,
  `descrpción` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`nombre`, `descrpción`) VALUES
('Ayuda', 'Actividades de Ayuda'),
('Contratos', 'Actividades rel a Contratos'),
('Cuentas', 'Actividades rel a Cuentas'),
('Empleados', 'Actividades rel a Empleados'),
('Empresas', 'Actividades rel a Empresas'),
('Entidades', 'Actividades rel a Entidades'),
('Perfiles', 'Actividades rel a Perfiles'),
('Reportes', 'analisis contratos y empl'),
('Sesión', 'Actividades de sesión'),
('Usuarios', 'Actividades rel a Usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `nit` bigint(17) NOT NULL,
  `nombre_empresa` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `descripción_empresa` text,
  `num_empleados` int(4) NOT NULL,
  `tipo_empresa` varchar(45) DEFAULT NULL,
  `inicio_actividad` int(2) NOT NULL,
  `fin_actividad` int(2) NOT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nit`, `nombre_empresa`, `direccion`, `email`, `telefono`, `descripción_empresa`, `num_empleados`, `tipo_empresa`, `inicio_actividad`, `fin_actividad`, `e`) VALUES
(1, 'PRUEBA SA', 'prueba', '9Pb7B+fNgorbXoXKGgO043UWJvIhWYBLas+1Og4FaHM=', '3144432469', 'edfghjkio9iuyhtgfrfgvbhnjikytgrfgvbhjki', 25, 'Educación', 8, 16, 1),
(124578964, 'Universidad San Buenaventura', 'Calle 172b#75-89', 'ilhU2TouBOT57CP+i9NzKw==\n', '7478523', 'Institución de educación superior ubicada en la ciudad de Bogotá', 5, 'Educación', 7, 17, 1),
(1154646321251, 'prueba 2', 'fddg', 'EcJuzFEW3NBpPcXOpRwCl+p0/7/gMFsBFosduuH8Vv8=', '5030241025', 'fdfjkdjhdkjfjhskfjkdksjjlkdfkdfgd', 0, 'Educación', 8, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `nit` bigint(17) NOT NULL,
  `nombre_entidad` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`nit`, `nombre_entidad`, `tipo`, `telefono`, `direccion`, `email`, `e`) VALUES
(1010254314, 'Compensar', 'EPS', '3173652100', 'Cra 45 # 17B- 47', '4gjrmqJIzUNdzF8nX/yaFuZQzHp6YS1WZnNCQE3nK9M=', 1),
(1010254335, 'Positiva', 'ARL', '3652147', 'Cll 72 $ 35 - 41', 'Rg6oC4h80q7M1oSKCWG6rL8godHT3fQwfmZPcOqq49E=', 1),
(1010254399, 'Colpensiones', 'FONDO DE PENSIONES', '7894561', 'Cra 35C $ 78 - 54', 'azGusZ+4Fb6mq1uAtLSLcjuyoEzZ/LuvP+HLd09bf38=', 1),
(1010297314, 'Compensar', 'CAJA DE COMPENSACIÓN', '7984125', 'Cll 100 A # 35 - 77', 'qs7DqlY0aZiJPQ4MkPfrLBYTaeKTulkk22YSQLASPqg=', 1),
(25478110455, 'Prueba 3', 'EPS', '5360510240', 'ckfjsklajdkldjska', '9Pb7B+fNgorbXoXKGgO043UWJvIhWYBLas+1Og4FaHM=', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades_contratadas`
--

CREATE TABLE `entidades_contratadas` (
  `nit_empresa` bigint(17) NOT NULL,
  `nit_entidad` bigint(17) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidades_contratadas`
--

INSERT INTO `entidades_contratadas` (`nit_empresa`, `nit_entidad`, `fecha_inicio`, `fecha_fin`, `e`) VALUES
(1, 1010254314, '2020-11-02', '2021-11-02', 1),
(1, 1010254335, '2020-11-02', '2021-11-02', 1),
(1, 1010254399, '2020-11-02', '2021-11-02', 1),
(1, 1010297314, '2020-11-02', '2021-11-02', 1),
(1, 25478110455, '2021-12-11', '2021-12-11', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_actividad`
--

CREATE TABLE `gestion_actividad` (
  `actividad` varchar(45) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gestion_actividad`
--

INSERT INTO `gestion_actividad` (`actividad`, `perfil`, `e`) VALUES
('Añadir Contrato', 'ADMINISTRADOR', 1),
('Añadir Cuenta', 'ADMINISTRADOR', 1),
('Añadir Empleado', 'TALENTO HUMANO GENERAL', 1),
('Añadir Empleado', 'TH EMPLEADO', 1),
('Añadir Empresa', 'ADMINISTRADOR', 1),
('Añadir Entidad', 'ADMINISTRADOR', 1),
('Añadir Perfil', 'ADMINISTRADOR', 1),
('Añadir Usuario', 'ADMINISTRADOR', 1),
('Asignar Cuenta Talento Humano', 'ADMINISTRADOR', 1),
('Buscar Contrato', 'ADMINISTRADOR', 1),
('Buscar Contrato', 'TALENTO HUMANO GENERAL', 1),
('Buscar Contrato', 'TH CONTRATOS', 1),
('Buscar Contrato por Empresa', 'ADMINISTRADOR', 1),
('Buscar Cuenta', 'ADMINISTRADOR', 1),
('Buscar Empleado', 'TALENTO HUMANO GENERAL', 1),
('Buscar Empleado', 'TH EMPLEADO', 1),
('Buscar Empresa', 'ADMINISTRADOR', 1),
('Buscar Entidad', 'ADMINISTRADOR', 1),
('Buscar Perfil', 'ADMINISTRADOR', 1),
('Buscar Usuario', 'ADMINISTRADOR', 1),
('Cambiar Contraseña Cuenta', 'ADMINISTRADOR', 1),
('Cambiar Estado Cuenta', 'ADMINISTRADOR', 1),
('Cambiar Perfil Cuenta', 'ADMINISTRADOR', 1),
('Cerrar Sesión', 'ADMINISTRADOR', 1),
('Cerrar Sesión', 'TALENTO HUMANO GENERAL', 1),
('Crear Contrato', 'TALENTO HUMANO GENERAL', 1),
('Crear Contrato', 'TH CONTRATOS', 1),
('Eliminar Contrato', 'ADMINISTRADOR', 1),
('Eliminar Cuenta', 'ADMINISTRADOR', 1),
('Eliminar Empresa', 'ADMINISTRADOR', 1),
('Eliminar Entidad', 'ADMINISTRADOR', 1),
('Eliminar Perfil', 'ADMINISTRADOR', 1),
('Eliminar Usuario', 'ADMINISTRADOR', 1),
('Generar Reporte', 'ADMINISTRADOR', 1),
('Generar Reporte', 'TALENTO HUMANO GENERAL', 1),
('Modificar Contrato', 'ADMINISTRADOR', 1),
('Modificar Contrato', 'TH CONTRATOS', 1),
('Modificar Cuenta', 'ADMINISTRADOR', 1),
('Modificar Empleado', 'TALENTO HUMANO GENERAL', 1),
('Modificar Empleado', 'TH EMPLEADO', 1),
('Modificar Empresa', 'ADMINISTRADOR', 1),
('Modificar Entidad', 'ADMINISTRADOR', 1),
('Modificar Perfil', 'ADMINISTRADOR', 1),
('Modificar Usuario', 'ADMINISTRADOR', 1),
('Necesito Ayuda', 'ADMINISTRADOR', 1),
('Necesito Ayuda', 'TALENTO HUMANO GENERAL', 1),
('Solicitar Cuenta Talento Humano', 'TALENTO HUMANO GENERAL', 1),
('Ver Comentarios', 'ADMINISTRADOR', 1),
('Ver Datos Cuenta', 'ADMINISTRADOR', 1),
('Ver Datos Cuenta', 'TALENTO HUMANO GENERAL', 1),
('Ver Todas las Cuentas', 'ADMINISTRADOR', 1),
('Ver Todas las Entidades', 'ADMINISTRADOR', 1),
('Ver Todas las Entidades', 'TALENTO HUMANO GENERAL', 1),
('Ver Todos las Empresas', 'ADMINISTRADOR', 1),
('Ver Todos los Contratos', 'ADMINISTRADOR', 1),
('Ver Todos los Contratos', 'TALENTO HUMANO GENERAL', 1),
('Ver Todos los Contratos', 'TH CONTRATOS', 1),
('Ver Todos los Empleados', 'TALENTO HUMANO GENERAL', 1),
('Ver Todos los Empleados', 'TH EMPLEADO', 1),
('Ver Todos los Perfiles', 'ADMINISTRADOR', 1),
('Ver Todos los Usuarios', 'ADMINISTRADOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_elemento`
--

CREATE TABLE `gestion_elemento` (
  `elemento` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gestion_elemento`
--

INSERT INTO `gestion_elemento` (`elemento`, `rol`) VALUES
('Ayuda', 'ADMINISTRADOR'),
('Contratos', 'ADMINISTRADOR'),
('Cuentas', 'ADMINISTRADOR'),
('Empresas', 'ADMINISTRADOR'),
('Entidades', 'ADMINISTRADOR'),
('Perfiles', 'ADMINISTRADOR'),
('Sesión', 'ADMINISTRADOR'),
('Usuarios', 'ADMINISTRADOR'),
('Ayuda', 'SUPER'),
('Ayuda', 'TALENTO HUMANO'),
('Contratos', 'TALENTO HUMANO'),
('Empleados', 'TALENTO HUMANO'),
('Entidades', 'TALENTO HUMANO'),
('Reportes', 'TALENTO HUMANO'),
('Sesión', 'TALENTO HUMANO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `cuenta` varchar(150) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` varchar(45) NOT NULL,
  `descrip` text NOT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`cuenta`, `fecha`, `accion`, `descrip`, `e`) VALUES
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-02 17:00:59', 'Perfil Buscado', 'Se Buscaron los datos del perfil:ADMINISTRADOR ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:21:28', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:22:23', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:22:45', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:23:20', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:23:39', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:25:07', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:25:43', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:28:05', 'Perfil Modificado Exitoso', 'Modifico los datos del Perfil:TH EMPLEADO    TALENTO HUMANO - TALENTO HUMANO', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:28:44', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 09:33:15', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 16:21:52', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 19:25:37', 'Perfiles Vistos', 'Se vieron todos los perfiles del sistema', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-03 21:45:49', 'Empresa Buscada', 'Se Buscaron los datos de la empresa:1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 10:11:13', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 10:11:28', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 10:12:20', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 10:14:30', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 10:16:03', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 10:19:27', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 11:02:26', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 11:03:53', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 11:03:54', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa  para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 11:18:21', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa  para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:39:09', 'Contrato Entidad Exitoso', 'Se creo un contrato entre la entidad 1010254314 y la empresa 1 de forma exitosa', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:39:25', 'Contrato Entidad Fallido', 'Ya trato de crear un contrato ya existente entre la entidad 1010297314 y la empresa 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:40:35', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:41:16', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:41:22', 'Empresa Buscada', 'Se Buscaron los datos de la empresa:1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:41:24', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:42:25', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:50:16', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:50:34', 'Contrato Entidad Exitoso', 'Se creo un contrato entre la entidad 25478110455 y la empresa 1 de forma exitosa', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:50:41', 'Contrato Entidad Fallido', 'Se trato de crear un contrato entre la entidad 25478110455 y la empresa 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:52:58', 'Contrato Entidad Exitoso', 'Se creo un contrato entre la entidad 25478110455 y la empresa 1 de forma exitosa', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:53:15', 'Contrato Entidad Fallido', 'Se trato de crear un contrato entre la entidad 25478110455 y la empresa 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:53:19', 'Contrato Entidad Exitoso', 'Se creo un contrato entre la entidad 25478110455 y la empresa 1 de forma exitosa', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:53:21', 'CEntEmp Eliminado Exitoso', 'Se Elimino el contrato entre la Entidad  25478110455 y la empresa 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:54:27', 'Empresa Buscada', 'Se Buscaron los datos de la empresa:1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:54:28', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa prueba para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:54:59', 'Contrato Entidad Fallido', 'Se trato de crear un contrato entre la entidad 25478110455 y la empresa 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:55:23', 'Contrato Entidad Exitoso', 'Se creo un contrato entre la entidad 25478110455 y la empresa 1 de forma exitosa', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 12:55:27', 'Empresa Buscada', 'Se Buscaron los datos de la empresa:1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:32:20', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:32:25', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:35:30', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:38:10', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:38:15', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:51:31', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:53:46', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:55:35', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:55:38', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:56:06', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:56:08', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:59:09', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:59:31', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 14:59:32', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:00:49', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:00:54', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:02:47', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:02:50', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:02:54', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:02:55', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: pruebaappausa@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:02:57', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:06:41', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:06:43', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:08:23', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:08:25', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:08:27', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:08:33', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:10:04', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:10:07', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:10:09', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:10:25', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:10:35', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta pruebaappausa@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:10:37', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:11:02', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:11:52', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:15:12', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:16:42', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:16:44', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:17:27', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:17:33', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:17:35', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:20:20', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:20:27', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:20:36', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:20:43', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:21:54', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:29:10', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:29:12', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:33:59', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:34:05', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:35:17', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:35:20', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:48:29', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:49:29', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:49:34', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:50:11', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:50:12', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:50:13', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:51:41', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:51:47', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:51:48', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:52:36', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:52:39', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:52:57', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:55:30', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:55:31', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:56:13', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 15:56:17', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:19:17', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:20:34', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:20:39', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:21:02', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:21:03', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:21:21', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:21:23', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:34:24', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:36:36', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:37:36', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:38:39', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:39:41', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:40:03', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:40:48', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:44:02', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:44:06', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:46:31', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:47:06', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:51:54', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:52:36', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:53:15', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:53:52', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:54:07', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:54:26', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:54:56', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:55:19', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:55:43', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:56:00', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:56:21', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:56:23', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta abcdefghijklmno@gmail.com', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:56:25', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:56:26', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 16:56:55', 'Registro de Actividad Visto', 'Se vieron los registros de actividad de la cuenta asociada al correo: lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:00:27', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:00:41', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:00:57', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:01:59', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:03:36', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:04:35', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:07:45', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:08:14', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:08:40', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:08:55', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:12:08', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 17:12:30', 'Reporte Actividad Generado', 'Se genero un documento PDF de la actividad de la cuenta lfvelascot@academia.usbbog.edu.co', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 21:22:49', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 21:25:09', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 22:27:50', 'Empresa Modificada Fallido', 'Se trataron de modificar los datos de la empresa: ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 22:27:57', 'Empresa Modificada Fallido', 'Se trataron de modificar los datos de la empresa: ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 22:29:14', 'Empresa Modificada Fallido', 'Se trataron de modificar los datos de la empresa: ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 22:29:37', 'Empresa Modificada Fallido', 'Se trataron de modificar los datos de la empresa: ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 22:30:09', 'Empresa Modificada Fallido', 'Se trataron de modificar los datos de la empresa: ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 22:32:15', 'Empresa Modificada Exitoso', 'Se modificaron los datos de la empresa: 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-04 22:32:38', 'Empresa Modificada Exitoso', 'Se modificaron los datos de la empresa: 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 15:13:04', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 15:20:46', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 15:59:15', 'Ingreso a la Aplicación', 'Sin problemas en el acceso', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 15:59:17', 'Usuarios Vistos', 'Se vieron todos los registros de Usuarios de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 15:59:20', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 15:59:23', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 15:59:27', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 16:00:34', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 16:00:56', 'Entidades Vistas', 'Se vieron todos los registros de Entidades inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 16:01:12', 'Entidades Vistas', 'Se vieron todos los registros de Entidades inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 16:01:15', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 16:08:07', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 16:55:32', 'Entidades Vistas', 'Se vieron todos los registros de Entidades inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 17:40:20', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 17:40:22', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa PRUEBA SA para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 17:41:03', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa PRUEBA SA para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 17:41:43', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa PRUEBA SA para la Seguridad social de sus empleados', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 17:43:00', 'CEntEmp Eliminado Exitoso', 'Se Elimino el contrato entre la Entidad  25478110455 y la empresa 1', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-05 17:43:09', 'Seguridad Social Vista', 'Se buscaron las entidades contratas en por parte de la empresa  para la Seguridad social de sus empleados', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 09:49:39', 'Contrato Buscado', 'Se Buscaron los datos del Contrato:2 de la Empresa:1', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 09:50:01', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 09:50:14', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 10:27:16', 'Ingreso a la Aplicación', 'Sin problemas en el acceso (1)', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 10:28:15', 'Empleado Buscado', 'Se Buscaron los datos del Empleado:1000373689', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 11:12:37', 'Empleados Vistos', 'Se vieron todos los registros de Empleados de 1', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 11:13:10', 'Contrato Buscado', 'Se Buscaron los datos del Contrato:2 de la Empresa:1', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 11:13:32', 'Contrato Buscado', 'Se Buscaron los datos del Contrato:2 de la Empresa:1', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 11:14:23', 'Contrato Buscado', 'Se Buscaron los datos del Contrato:2 de la Empresa:1', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 11:14:27', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 11:15:39', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-03 11:23:32', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '2020-11-04 21:25:02', 'Ingreso Fallido', 'Accedio sin problemas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `nombre` varchar(45) NOT NULL,
  `descrpción` varchar(45) NOT NULL,
  `rol_asociado` varchar(45) NOT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`nombre`, `descrpción`, `rol_asociado`, `e`) VALUES
('ADMINISTRADOR', 'Rol para los Admon de la aplicación web', 'ADMINISTRADOR', 1),
('SUPER', 'Rol para Super de la aplicación web', 'SUPER', 1),
('TALENTO HUMANO GENERAL', 'Rol para los TH de las empresas', 'TALENTO HUMANO', 1),
('TH CONTRATOS', 'Encargado de los contratos', 'TALENTO HUMANO', 1),
('TH EMPLEADO', 'Encargado de los Empleado', 'TALENTO HUMANO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `nombre` varchar(45) NOT NULL,
  `descrpción` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`nombre`, `descrpción`) VALUES
('ADMINISTRADOR', 'Rol para los Admon de la aplicación web'),
('EMPLEADO', 'Rol designado a los empleados de las empresas'),
('SUPER', 'Rol para Super de la aplicación web'),
('TALENTO HUMANO', 'Rol para los TH de las empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_th`
--

CREATE TABLE `solicitud_th` (
  `empleado` bigint(10) NOT NULL,
  `funcion` text NOT NULL,
  `fecha_env` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud_th`
--

INSERT INTO `solicitud_th` (`empleado`, `funcion`, `fecha_env`) VALUES
(365145, 'szdfghjhgfdsdfghjkiujytredfvghjuiuytredfghju', '2020-11-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `nombre` varchar(45) NOT NULL,
  `descrip` varchar(45) NOT NULL,
  `duracion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`nombre`, `descrip`, `duracion`) VALUES
('Definido', 'Contrato por cierto Tiempo', 'Definido por la empresa'),
('Indefinido', 'Sin tiempo definido', 'A decisión de la Empresa'),
('Obra Labor', 'Contrato a corto tiempo', 'Definido por la empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empresa`
--

CREATE TABLE `tipo_empresa` (
  `nombre_tipo` varchar(45) NOT NULL,
  `actividad` varchar(45) NOT NULL,
  `descripción` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_empresa`
--

INSERT INTO `tipo_empresa` (`nombre_tipo`, `actividad`, `descripción`) VALUES
('Educación', 'Educar', 'Instituciones de educación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cc` bigint(10) NOT NULL,
  `tipo_doc` varchar(45) NOT NULL,
  `pnombre` varchar(45) NOT NULL,
  `snombre` varchar(45) DEFAULT NULL,
  `papellido` varchar(45) NOT NULL,
  `sapellido` varchar(45) NOT NULL,
  `fecha_nam` date NOT NULL,
  `edad` int(2) NOT NULL,
  `correo_electronico` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `e` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cc`, `tipo_doc`, `pnombre`, `snombre`, `papellido`, `sapellido`, `fecha_nam`, `edad`, `correo_electronico`, `telefono`, `rol`, `e`) VALUES
(18, 'Cedula Ciudadania', 'Andrea', 'Catalina', 'Lopes', 'Torrez', '1998-02-18', 22, 'rS8jLn5CM1vFB9jEVZ3e3pJ0kzFIMMgGmXtf7QQtb8Q=', '3214567', 'ADMINISTRADOR', 1),
(35, 'Cedula Ciudadania', 'MARIA', 'ANDREA', 'PEREZ', 'GONZALEZ', '2018-11-01', 14, '0TZAg3JY6BrM2Z6GZaavn8e3X77rz6uirIcmMTekFLA=', '3125555', 'EMPLEADO', 1),
(36, 'Cedula Ciudadania', 'Karol', 'Andrea', 'Marquez', 'Paez', '2000-06-18', 20, '9v/zzvgDbL90xqs4/BdPtpO6MT1Nv5TbG7gK4+vlSyM=', '3147894512', 'EMPLEADO', 1),
(54, 'Cedula Extranjeria', 'ANDREA', NULL, 'PEREZ', 'RODRIGUEZ', '1981-07-16', 49, 'XiW8B3kdQsEZuL7gZw1IBPsIjh209HHTS3dkn+o1WW0=', '3214569', 'EMPLEADO', 1),
(99, 'Cedula Ciudadania', 'Felipe', 'Felipe   ', 'Torres', 'Torres', '2000-12-16', 19, 'lykZj0FwXgJkk1sgourTAtUpqOJF0ujxlvcaxBqYjNYeLn1757X+t5PXCi6SykOh', '3140005423', 'ADMINISTRADOR', 1),
(24571, 'Cedula Ciudadania', 'MARIA', 'JOSE', 'PEREZ', 'TORRES', '2000-02-01', 20, 'vXqeWvSdmnATPXP33VGtMO252/zPE0W9WWy7XRGE47o=', '3540014', 'EMPLEADO', 1),
(365145, 'Cedula Ciudadania', 'JOSE', NULL, 'CASTRO', 'GONZALEZ', '2012-06-01', 8, 'xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', '7415200', 'TALENTO HUMANO', 1),
(36985214, 'Cedula Ciudadania', 'MARIA', 'DEL CARMEN', 'TAO', 'ROJAS', '1981-07-16', 49, 'C+Os8EDWGaXBv1WHMFcxyBn/AjvIpj5zUnPpZ1uJ21w=', '3052418930', 'EMPLEADO', 1),
(1000373689, 'Cedula Ciudadania', 'LUIS', 'ANDRES', 'PEREZ', 'GONZALEZ', '2020-10-02', 33, 'b5MVnxDYMXwQmDu6jnkfYmMmg5kB29xVaGGMFScvc5edS7ZsmMNRw3Ap7Vc8WQDW', '3140005429', 'EMPLEADO', 1),
(1000689373, 'Cedula Ciudadania', 'LUIS', 'FELIPE', 'VELASCO', 'TAO', '2000-12-28', 19, 'cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '3144432469', 'ADMINISTRADOR', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accion`
--
ALTER TABLE `accion`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`nombre`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `fk_actividad_elemento` (`elemento`);

--
-- Indices de la tabla `contrasena_restablecida`
--
ALTER TABLE `contrasena_restablecida`
  ADD PRIMARY KEY (`fecha`,`cuenta`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fk_contrasena_restablecida_cuenta1_idx` (`cuenta`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`num_contrato`,`empresa`),
  ADD KEY `fk_contrato_empleado1_idx` (`empleado`),
  ADD KEY `fk_contrato_entidad3_idx` (`eps`),
  ADD KEY `fk_contrato_empresa1_idx` (`empresa`),
  ADD KEY `fk_contrato_tipo_contrato1_idx` (`tipo_contrato`),
  ADD KEY `fk_contrato_entidad` (`arl`),
  ADD KEY `fk_contrato_entidad1` (`caja_compensación`),
  ADD KEY `fk_contrato_entidad2` (`fondo_pensiones`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`correo_electronico`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fk_cuentaapp_usuario_idx` (`usuario`),
  ADD KEY `fk_cuenta_perfil` (`perfil`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`nit`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `nombre_empresa` (`nombre_empresa`),
  ADD KEY `fk_empresa_tipo_idx` (`tipo_empresa`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`nit`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `entidades_contratadas`
--
ALTER TABLE `entidades_contratadas`
  ADD PRIMARY KEY (`nit_empresa`,`nit_entidad`),
  ADD KEY `fk_entidades_cotratadas_entidad` (`nit_entidad`);

--
-- Indices de la tabla `gestion_actividad`
--
ALTER TABLE `gestion_actividad`
  ADD PRIMARY KEY (`actividad`,`perfil`),
  ADD KEY `fk_gestion_actividad_actividad_idx` (`actividad`),
  ADD KEY `fk_gestion_actividad_perfil_idx` (`perfil`);

--
-- Indices de la tabla `gestion_elemento`
--
ALTER TABLE `gestion_elemento`
  ADD PRIMARY KEY (`elemento`,`rol`),
  ADD KEY `fk_gestion_elemento_rol` (`rol`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`cuenta`,`fecha`),
  ADD KEY `fk_log_accion_idx` (`accion`),
  ADD KEY `fk_log_cuenta_idx` (`cuenta`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `fk_perfil_rol` (`rol_asociado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `solicitud_th`
--
ALTER TABLE `solicitud_th`
  ADD PRIMARY KEY (`empleado`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  ADD PRIMARY KEY (`nombre_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cc`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD KEY `fk_usuario_rol_idx` (`rol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_elemento` FOREIGN KEY (`elemento`) REFERENCES `elemento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrasena_restablecida`
--
ALTER TABLE `contrasena_restablecida`
  ADD CONSTRAINT `fk_contrasena_restablecida_cuenta1` FOREIGN KEY (`cuenta`) REFERENCES `cuenta` (`correo_electronico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_contrato_empleado` FOREIGN KEY (`empleado`) REFERENCES `usuario` (`cc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contrato_empresa1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`nit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contrato_entidad` FOREIGN KEY (`arl`) REFERENCES `entidad` (`nit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contrato_entidad1` FOREIGN KEY (`caja_compensación`) REFERENCES `entidad` (`nit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contrato_entidad2` FOREIGN KEY (`fondo_pensiones`) REFERENCES `entidad` (`nit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contrato_entidad3` FOREIGN KEY (`eps`) REFERENCES `entidad` (`nit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contrato_tipo_contrato1` FOREIGN KEY (`tipo_contrato`) REFERENCES `tipo_contrato` (`nombre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `fk_cuenta_perfil` FOREIGN KEY (`perfil`) REFERENCES `perfil` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuentaapp_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`cc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_tipo` FOREIGN KEY (`tipo_empresa`) REFERENCES `tipo_empresa` (`nombre_tipo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `entidades_contratadas`
--
ALTER TABLE `entidades_contratadas`
  ADD CONSTRAINT `fk_entidades_cotratadas_empresa` FOREIGN KEY (`nit_empresa`) REFERENCES `empresa` (`nit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entidades_cotratadas_entidad` FOREIGN KEY (`nit_entidad`) REFERENCES `entidad` (`nit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestion_actividad`
--
ALTER TABLE `gestion_actividad`
  ADD CONSTRAINT `fk_gestion_actividad_actividad` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gestion_actividad_perfil` FOREIGN KEY (`perfil`) REFERENCES `perfil` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestion_elemento`
--
ALTER TABLE `gestion_elemento`
  ADD CONSTRAINT `fk_gestion_elemento_elemento` FOREIGN KEY (`elemento`) REFERENCES `elemento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gestion_elemento_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_accion1` FOREIGN KEY (`accion`) REFERENCES `accion` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_log_cuenta1` FOREIGN KEY (`cuenta`) REFERENCES `cuenta` (`correo_electronico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fk_perfil_rol` FOREIGN KEY (`rol_asociado`) REFERENCES `rol` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_th`
--
ALTER TABLE `solicitud_th`
  ADD CONSTRAINT `fk_solicitudth_usuario` FOREIGN KEY (`empleado`) REFERENCES `usuario` (`cc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`nombre`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
