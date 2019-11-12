<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
        <head>
			<link rel="stylesheet" href="../styles/styles.css">
		</head>
		<body>
			<table border="1">
				<thead>
					<tr>
						<th>Autor</th>
						<th>Enunciado</th>
						<th>Respuesta Correcta</th>
						<th>Respuestas Incorrectas</th>
						<th>Tema</th>
					</tr>
				</thead>
				<xsl:for-each select="/assessmentItems/assessmentItem">
					<tr>
						<td>
							<xsl:value-of select="@author"/>
						</td>
						<td>
							<xsl:value-of select="itemBody/p"/>
						</td>
						<td>
							<xsl:value-of select="correctResponse/value"/>
						</td>
						<td>
						   <xsl:for-each select="incorrectResponses/value">
							<li>
								<xsl:value-of select="."/>
							</li>
							</xsl:for-each>
						</td>
						<td>
							<xsl:value-of select="@subject"/>
						</td>
					</tr>
				</xsl:for-each>
			</table>
		</body>
		</html>
    </xsl:template>
</xsl:stylesheet>