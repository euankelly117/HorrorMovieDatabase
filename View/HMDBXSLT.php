<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://feeds.feedburner.com/horrormoviepodcast">
<xsl:template match="/">
<html> 
<body>
  <h2>My CD Collection</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th style="text-align:left">title</th>
      <th style="text-align:left">link</th>
    </tr>
    <xsl:for-each select="item">
    <tr>
      <td><xsl:value-of select="title"/></td>
      <td><xsl:value-of select="link"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>