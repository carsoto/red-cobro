<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionDashboardStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE PROCEDURE funcion_dashboard(CARTERA INT)
                        BEGIN
                        DROP TABLE IF EXISTS BASE_DASHBOARD;

                        CREATE TABLE BASE_DASHBOARD(
                            MARCA1 VARCHAR (100),
                            MARCA2 VARCHAR (100),
                            MARCA3 VARCHAR (100),
                            MARCA4 VARCHAR (100),
                            MARCA5 VARCHAR (100),
                            MARCA6 VARCHAR (100),
                            OPERACIONES INT(11),
                            MONTO DOUBLE,
                            GESTIONES INT,
                            COMPROMISOS INT,
                            MONTO_COMPROMISOS INT,
                            TITULAR INT, 
                            TERCERO INT,
                            SIN_CONTACTO INT,
                            IDDEUDORES INT,
                            RUT VARCHAR(15)
                        );

                        INSERT INTO BASE_DASHBOARD
                        SELECT 
                        '' as MARCA1,
                        '' as MARCA2,
                        '' as MARCA3,
                        '' as MARCA4,
                        '' as MARCA5,
                        '' as MARCA6,
                        0 AS OPERACIONES,
                        d.monto_asignacion as MONTO,
                        0 AS GESTIONES,
                        0 AS COMPROMISOS,
                        0 AS MONTO_COMPROMISOS,
                        0 AS TITULAR, 
                        0 AS TERCERO,
                        0 AS SIN_CONTACTO,
                        d.iddeudores,
                        d.rut_dv
                        FROM deudores d
                        INNER JOIN documentos dc on dc.deudores_iddeudores = d.iddeudores
                        INNER JOIN deudores_gestiones dg on dg.iddeudoresgestiones = d.iddeudores
                        WHERE #d.carteras_idcarteras = CARTERA and 
                        d.en_gestion = 1;

                        UPDATE BASE_DASHBOARD d 
                        INNER JOIN deudores_marcas dm on dm.iddeudores = d.iddeudores
                        INNER JOIN marcas m on m.idmarcas = dm.idmarcas
                        SET d.MARCA1 = m.marca
                        WHERE m.orden = 1;

                        UPDATE BASE_DASHBOARD d 
                        INNER JOIN deudores_marcas dm on dm.iddeudores = d.iddeudores
                        INNER JOIN marcas m on m.idmarcas = dm.idmarcas
                        SET d.MARCA2 = m.marca
                        WHERE m.orden = 2;

                        UPDATE BASE_DASHBOARD d 
                        INNER JOIN deudores_marcas dm on dm.iddeudores = d.iddeudores
                        INNER JOIN marcas m on m.idmarcas = dm.idmarcas
                        SET d.MARCA3 = m.marca
                        WHERE m.orden = 3;

                        UPDATE BASE_DASHBOARD d 
                        INNER JOIN deudores_marcas dm on dm.iddeudores = d.iddeudores
                        INNER JOIN marcas m on m.idmarcas = dm.idmarcas
                        SET d.MARCA4 = m.marca
                        WHERE m.orden = 4;

                        UPDATE BASE_DASHBOARD d 
                        INNER JOIN deudores_marcas dm on dm.iddeudores = d.iddeudores
                        INNER JOIN marcas m on m.idmarcas = dm.idmarcas
                        SET d.MARCA5 = m.marca
                        WHERE m.orden = 5;

                        UPDATE BASE_DASHBOARD d 
                        INNER JOIN deudores_marcas dm on dm.iddeudores = d.iddeudores
                        INNER JOIN marcas m on m.idmarcas = dm.idmarcas
                        SET d.MARCA6 = m.marca
                        WHERE m.orden = 6;

                        #CONTADOR GESTIONES
                        DROP TABLE IF EXISTS TMP_DASHBOARD;

                        CREATE TABLE TMP_DASHBOARD
                        SELECT d.iddeudores, COUNT(dg.deudores_iddeudores) AS CONT
                        FROM BASE_DASHBOARD d
                        INNER JOIN deudores_gestiones dg on dg.deudores_iddeudores = d.iddeudores
                        WHERE fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')
                        GROUP BY d.iddeudores;

                        UPDATE BASE_DASHBOARD B
                        INNER JOIN TMP_DASHBOARD T ON B.iddeudores = T.iddeudores
                        SET B.GESTIONES = T.CONT;

                        #CONTADOR CONTACTOS DIRECTOS
                        DROP TABLE IF EXISTS TMP_DASHBOARD;

                        CREATE TABLE TMP_DASHBOARD
                        SELECT d.iddeudores, SUM(dg.contacto_directo) AS CONT
                        FROM BASE_DASHBOARD d
                        INNER JOIN deudores_gestiones dg on dg.deudores_iddeudores = d.iddeudores
                        WHERE fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')
                        and dg.contacto_directo = 1
                        GROUP BY d.iddeudores;

                        UPDATE BASE_DASHBOARD B
                        INNER JOIN TMP_DASHBOARD T ON B.iddeudores = T.iddeudores
                        SET B.TITULAR = T.CONT;

                        #CONTADOR CONTACTOS DIRECTOS
                        DROP TABLE IF EXISTS TMP_DASHBOARD;

                        CREATE TABLE TMP_DASHBOARD
                        SELECT d.iddeudores, SUM(dg.contacto_directo) AS CONT
                        FROM BASE_DASHBOARD d
                        INNER JOIN deudores_gestiones dg on dg.deudores_iddeudores = d.iddeudores
                        WHERE fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')
                        and dg.contacto_directo = 1
                        GROUP BY d.iddeudores;

                        UPDATE BASE_DASHBOARD B
                        INNER JOIN TMP_DASHBOARD T ON B.iddeudores = T.iddeudores
                        SET B.TITULAR = T.CONT;

                        #CONTADOR CONTACTOS inDIRECTOS
                        DROP TABLE IF EXISTS TMP_DASHBOARD;

                        CREATE TABLE TMP_DASHBOARD
                        SELECT d.iddeudores, SUM(dg.contacto_indirecto) AS CONT
                        FROM BASE_DASHBOARD d
                        INNER JOIN deudores_gestiones dg on dg.deudores_iddeudores = d.iddeudores
                        WHERE fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')
                        and dg.contacto_indirecto = 1 AND d.TITULAR = 0
                        GROUP BY d.iddeudores;

                        UPDATE BASE_DASHBOARD B
                        INNER JOIN TMP_DASHBOARD T ON B.iddeudores = T.iddeudores
                        SET B.TERCERO = T.CONT;


                        #CONTADOR SIN CONTACTO
                        DROP TABLE IF EXISTS TMP_DASHBOARD;

                        CREATE TABLE TMP_DASHBOARD
                        SELECT d.iddeudores, SUM(dg.sin_contacto) AS CONT
                        FROM BASE_DASHBOARD d
                        INNER JOIN deudores_gestiones dg on dg.deudores_iddeudores = d.iddeudores
                        WHERE fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')
                        and dg.sin_contacto = 1 AND d.TITULAR = 0 and d.TERCERO = 0
                        GROUP BY d.iddeudores;

                        UPDATE BASE_DASHBOARD B
                        INNER JOIN TMP_DASHBOARD T ON B.iddeudores = T.iddeudores
                        SET B.SIN_CONTACTO = T.CONT;


                        #COMPROMISOS
                        DROP TABLE IF EXISTS TMP_DASHBOARD;

                        CREATE TABLE TMP_DASHBOARD
                        SELECT d.iddeudores, SUM(dg.compromiso) AS CONT 
                        FROM BASE_DASHBOARD d
                        INNER JOIN deudores_gestiones dg on dg.deudores_iddeudores = d.iddeudores
                        WHERE fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')
                        and dg.compromiso = 1
                        GROUP BY d.iddeudores;

                        UPDATE BASE_DASHBOARD B
                        INNER JOIN TMP_DASHBOARD T ON B.iddeudores = T.iddeudores
                        SET B.SIN_CONTACTO = T.CONT;

                        #CANTIDAD OPERACIONES
                        DROP TABLE IF EXISTS TMP_DASHBOARD;

                        CREATE TABLE TMP_DASHBOARD
                        SELECT count(dc.iddocumentos) as cant, d.iddeudores
                        FROM BASE_DASHBOARD d
                        inner join documentos dc on dc.deudores_iddeudores = d.iddeudores
                        GROUP BY d.iddeudores;

                        UPDATE BASE_DASHBOARD D
                        INNER JOIN TMP_DASHBOARD T ON T.iddeudores = D.iddeudores
                        SET D.operaciones = T.CANT;

                        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DROP PROCEDURE IF EXISTS funcion_dashboard";
        DB::connection()->getPdo()->exec($sql);
    }
}
