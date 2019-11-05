<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <HTML>
        <head>
        <style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid black;
			padding: 8px;
		}

		th{
			background-color: #0066ff;
			color: white;
			text-align: center;
		}
		td{
			text-align: left;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
    </head>
            <BODY>
                <P>Preguntas XML</P>
                <TABLE border="1">
                    <THEAD>
                        <TR>
                            <TH>Autor</TH>
                            <TH>Enunciado</TH>
                            <TH>Respuesta Correcta</TH>
                            <TH>Respuestas Incorrectas</TH>
                            <TH>Tema</TH>
                        </TR>
                    </THEAD>
                    <xsl:for-each select="/assessmentItems/assessmentItem">
                        <TR>
                            <TD>
                                <xsl:value-of select="@author"/>
                            </TD>
                            <TD>
                                <xsl:value-of select="itemBody/p"/>
                            </TD>
                            <TD>
                                <xsl:value-of select="correctResponse/value"/>
                            </TD>
                            <TD>
                               <xsl:for-each select="incorrectResponses/value">
                                <li>
                                    <xsl:value-of select="."/>
                                </li>
                                </xsl:for-each>
                            </TD>
                            <TD>
                                <xsl:value-of select="@subject"/>
                            </TD>
                        </TR>
                    </xsl:for-each>
                </TABLE>
            </BODY>
        </HTML>
    </xsl:template>
</xsl:stylesheet>