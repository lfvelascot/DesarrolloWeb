-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2020 a las 02:19:21
-- Versión del servidor: 5.7.31-log
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appausadb`
--
create user 'appausa_user'@'%' identified by 'appausa2020';
CREATE SCHEMA IF NOT EXISTS `appausadb` DEFAULT CHARACTER SET utf8 ;
grant all privileges on appausadb.* to 'appausa_user'@'%';
USE `appausadb` ;
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
('Comentario Enviado', 'Comentario Enviado'),
('Comentario No Enviado', 'Comentario NO Enviado'),
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
('Entidades Contratadas Vistas', 'Entidades Contratadas Vistas'),
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
('Enviar Comentario', 'Ayuda', 'enviarComentario.php'),
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
('Ver Entidades Contratadas', 'Entidades', 'verEntidadesCont.php'),
('Ver Todas las Cuentas', 'Cuentas', 'verCuentas.php'),
('Ver Todas las Entidades', 'Entidades', 'verEntidades.php'),
('Ver Todos las Empresas', 'Empresas', 'verEmpresas.php'),
('Ver Todos los Contratos', 'Contratos', 'verContratos.php'),
('Ver Todos los Empleados', 'Empleados', 'verEmpleados.php'),
('Ver Todos los Perfiles', 'Perfiles', 'verPerfiles.php'),
('Ver Todos los Usuarios', 'Usuarios', 'verUsuarios.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `fecha` datetime NOT NULL,
  `cuenta` varchar(150) NOT NULL,
  `contenido` text NOT NULL,
  `e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`fecha`, `cuenta`, `contenido`, `e`) VALUES
('2020-11-06 23:49:37', 'cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 'dfgyhujik,mjnbhvgfrdftgyhuikolkmjnhbgvfrty7uiko,mjnbgvfrtyuikomn bgvfrty7ujikmnbgvfty7uikjhgvfr', 1),
('2020-11-10 12:53:37', 'cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', 'xghjklokjhgfdefghjklkjhgfdsdfghjkll.kjhgfdsdjklkjhgfdsñlgvfdtyi474f65dfs454df65gds654g65 65df6dg4654d65g4d5ds45g465dg485dg564d54g5d45g46fds', 1),
('2020-11-10 12:54:11', 'xRzzEq76rzxN9XbRXA08k3clnquI0f6S4GVK21mrHn64HbJ9L5b8kLuNoIUSXfFL', 'kfdokdfskodfsosdfkdsofosfoisofosojdsh jndjodjf ofpodgk   jfgoikgodfopfop dfjod ifds opdfod', 1);

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
(5, 36, 1, 'Talento Humano', '2020-10-12', '2021-10-12', 1200000, 'xxxxxxxxxxxxxyyyyyyyyyyyyyyyyyyyyyyyyy', 1010254335, 1010297314, 1010254399, 1010254314, 'Definido', 1),
(125478, 30247896, 145211004256, 'Talento Humano', '2020-11-16', '2021-11-16', 950120, 'Aqui van las funciones del empleado de talento humano', 1010254335, 1010297314, 1010254399, 1010254314, 'Definido', 1),
(145278, 30254690, 145211004256, 'Talento Humano', '2020-11-19', '2021-11-19', 985470, 'aqui van las funciones del empleado en la empresa para poder conocerlas', 1010254335, 1010297314, 1010254399, 25478110455, 'Definido', 1);

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
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '23U2X7HekUS0cKTaBKoNGg==', 'ACTIVA', 'TALENTO HUMANO GENERAL', 30254690, 1, 0),
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
(145211004256, 'Empresa 3', 'Calle 100 - 30', 'yIQt0OUCRejvwE+h+QnK1Gp7jTZ6pMgOibmCP0uErOA=', '0030210012', 'Aquí va a la descripción de la empresa', 2, 'Construcción', 8, 16, 1),
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
(14511454111, 'Entidad Prueba C', 'FONDO DE PENSIONES', '8777485', 'Calle 100 - 30', 'dLx9Eo7H1KaQPiyAUAoT0QbRIFUcaeLAD+UrQI0n6iw=', 0),
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
(1, 25478110455, '2020-12-12', '2020-12-12', 1),
(145211004256, 1010254314, '2020-11-15', '2020-11-15', 1),
(145211004256, 1010254335, '2020-11-15', '2020-11-15', 1),
(145211004256, 1010254399, '2020-11-15', '2020-11-15', 1),
(145211004256, 1010297314, '2020-11-15', '2020-11-15', 1),
(145211004256, 25478110455, '2020-11-15', '2020-11-15', 0);

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
('Enviar Comentario', 'ADMINISTRADOR', 1),
('Enviar Comentario', 'TALENTO HUMANO GENERAL', 1),
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
('Ver Entidades Contratadas', 'TALENTO HUMANO GENERAL', 1),
('Ver Todas las Cuentas', 'ADMINISTRADOR', 1),
('Ver Todas las Entidades', 'ADMINISTRADOR', 1),
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
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 15:57:49', 'Ingreso Fallido', 'No existe un contrato que lo asocie con ninguna empresa', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 16:01:48', 'Ingreso Fallido', 'No existe un contrato que lo asocie con ninguna empresa', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 16:05:24', 'Ingreso a la Aplicación', 'Sin problemas en el acceso (145211004256)', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 16:05:28', 'Entidades Contratadas Vistas', 'Se vieron las entidades contratadas de la empresa Empresa 3', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 17:43:58', 'Empleado Añadido Exitoso', 'Inserto los datos del Empleado:30247896', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:00:48', 'Empleado Buscado', 'Se Buscaron los datos del Empleado:30247896', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:06:53', 'Entidades Contratadas Vistas', 'Se vieron las entidades contratadas de la empresa Empresa 3', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:07:00', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:10:45', 'Entidades Contratadas Vistas', 'Se vieron las entidades contratadas de la empresa Empresa 3', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:13:13', 'Contrato Añadido Exitoso', 'Inserto los datos del Contrato:125478 de la empresa :145211004256', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:13:16', 'Empleados Vistos', 'Se vieron todos los registros de Empleados de 145211004256', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:13:24', 'Contratos Vistos', 'Se vieron todos los registros de los Contratos', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:13:26', 'Empleados Vistos', 'Se vieron todos los registros de Empleados de 145211004256', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:24:08', 'Usuarios Vistos', 'Se vieron todos los registros de Usuarios de APPAUSA WEB', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:26:16', 'Empleado Añadido Exitoso', 'Inserto los datos del Empleado:', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:30:38', 'Empleados Vistos', 'Se vieron todos los registros de Empleados de 145211004256', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:32:55', 'Empleados Vistos', 'Se vieron todos los registros de Empleados de 145211004256', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:34:15', 'Ingreso Fallido', 'Accedio sin problemas', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:43:30', 'Ingreso Fallido', 'Accedio sin problemas', 1),
('AxmCe8msbkVnbD7Jyx2ib03WTX4AdlAQq/+gwD7ndXg=', '2020-11-16 19:46:09', 'Ingreso Fallido', 'La cuenta de este usuario se encuentra BLOQUEADA, pero trato de ingresar', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:19:25', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:19:40', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:21:02', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:22:23', 'Empresas Vistas', 'Se vieron todos los registros de Empresas inscritas en APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:22:31', 'Contrato Buscado', 'Se Buscaron los datos de los Contratos de la Empres:145211004256', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:45:54', 'Cuenta Buscado', 'Se Buscaron los datos de la Cuenta:30254690 ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:47:49', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:54:54', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : appausa_user', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:55:03', 'Cuenta Buscado', 'Se Buscaron los datos de la Cuenta:30254690 ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:55:07', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : appausa_user', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:55:12', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : appausa_user', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:55:13', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : appausa_user', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:55:14', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : appausa_user', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:55:19', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:56:37', 'Cuentas Vistas', 'Se vieron todos los registros de todas las Cuentas de APPAUSA WEB', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:56:43', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : appausa_user', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 19:57:07', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : appausa_user', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:01:34', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : 18', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:01:35', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : 18', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:01:36', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : 18', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:01:37', 'Cuenta Modificado Fallido', 'Conflicto con la actualizacion del estado de la cuenta del usuario : 18', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:02:50', 'Cuenta Modificado Fallido', '', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:02:51', 'Cuenta Modificado Fallido', '', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:02:52', 'Cuenta Modificado Fallido', '', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:02:53', 'Cuenta Modificado Fallido', '', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:02:54', 'Cuenta Modificado Fallido', '', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:04:34', 'Cuenta Buscado', 'Se Buscaron los datos de la Cuenta:18 ', 1),
('cJtGiaBdARQcqSnOLJssVQ+Gxt3o3jwrnIYk4newydelLkkVoCkFo2o0QJ+cd1Fi', '2020-11-16 20:05:36', 'Cuenta Buscado', 'Se Buscaron los datos de la Cuenta:18 ', 1);

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
(365145, 'szdfghjhgfdsdfghjkiujytredfvghjuiuytredfghju', '2020-11-01'),
(30247896, 'El empleado debe encargarse de los contratos de la empresa', '2020-11-16');

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
('Aseo', 'Asear', 'Empresas de Aseo'),
('Construcción', 'Contruir', 'Empresa de Construcción'),
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
(30247896, 'Cedula Ciudadania', 'Carmen', 'Lorena', 'Lopez', 'Gonzales', '2000-11-28', 19, 'y6mZXvyX+s4Jcfp4nHDg2VQUf3T6hbx8/na/hg5B5ZE=', '1031200046', 'EMPLEADO', 1),
(30254690, 'Cedula Ciudadania', 'Jorge', 'Esteban', 'Perez', 'Pedraza', '1999-12-28', 20, 'GuyhKoUTMstrpcJgpY/8ODOJq42++RaTjHv1Gkvib0E=', '0431004052', 'TALENTO HUMANO', 1),
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
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`fecha`,`cuenta`),
  ADD KEY `fk_comentario_cuenta` (`cuenta`);

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
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_cuenta` FOREIGN KEY (`cuenta`) REFERENCES `cuenta` (`correo_electronico`);

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
