<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"  xmlns:tei="http://www.tei-c.org/ns/1.0">
<xsl:output method="html" version="4.0"
    encoding="UTF-8" indent="no"/>

    <xsl:template match="/">
      <html>
        <body>
          <div>
            <xsl:apply-templates select="tei:TEI/tei:text/tei:body/tei:div" />
          </div>
        </body>
      </html>
    </xsl:template>

    <xsl:template match="//tei:lg">
      <p><xsl:apply-templates/></p>
    </xsl:template>

    <xsl:template match="//tei:l">
      <span><xsl:apply-templates/></span><br />
    </xsl:template>

    <xsl:template match="//tei:opener">
      <p id="opener"><xsl:apply-templates/></p>
    </xsl:template>

    <xsl:template match="tei:p">
      <p><xsl:apply-templates/></p>
    </xsl:template>

    <xsl:template match="tei:pb">
      <span class="pb {@facs}_{@n}"><xsl:value-of select="." /></span>
    </xsl:template>

    <xsl:template match="tei:add">
      <span class="sup" title="lisäys"><xsl:apply-templates/></span>
    </xsl:template>

    <xsl:template match="tei:hi[@rend = 'underline']">
      <span class="underline" title="alleviivaus"><xsl:apply-templates/></span>
    </xsl:template>

    <xsl:template match="tei:hi[@rend = 'superscript']">
      <span class="superscript" title="yläindeksi"><xsl:apply-templates/></span>
    </xsl:template>

    <xsl:template match="tei:del">
      <span class="del" title="poisto"><xsl:apply-templates/></span>
    </xsl:template>

    <xsl:template match="tei:unclear">
      <span class="unclear" title="epäselvä kohta">
        <xsl:apply-templates/>
      </span>
    </xsl:template>

    <xsl:template match="tei:app">
      <span class="comm tooltip bt" href="#">
        <xsl:value-of select="current()/tei:lem" />
        <span><xsl:value-of select="current()/tei:rdg" /></span>
      </span>
    </xsl:template>

    <!--<xsl:template match="tei:ref" priority="99">
      <span class="comm tooltip bt" href="#">
        <xsl:value-of select="node()"/>
        <span><xsl:value-of select="current()/tei:note" /></span>
      </span>
    </xsl:template>-->

    <xsl:template match="tei:table">
      <table>
        <xsl:apply-templates/>
      </table>
    </xsl:template>

    <xsl:template match="tei:table/tei:row">
      <tr>
        <xsl:apply-templates/>
      </tr>
    </xsl:template>

    <xsl:template match="tei:table/tei:row/tei:cell">
      <td>
        <xsl:apply-templates/>
      </td>
    </xsl:template>

    <xsl:template match="tei:gap">
      <span class="gap" title="tyhjä kohta tekstissä"><xsl:text>gap</xsl:text></span>
    </xsl:template>

    <xsl:template match="tei:ptr">
      <a style="background-color:#e7d6ff;" target="_blank" href="{current()/@target}">
        <xsl:value-of select="current()/@n" />
        <xsl:apply-templates />
      </a>
    </xsl:template>

    <xsl:template match="tei:ref" priority="99">
      <span class="comm tooltip bt" href="#">
        <xsl:value-of select="node()"/>
        <span><xsl:value-of select="current()/tei:note" /></span>
      </span>
    </xsl:template>

  </xsl:stylesheet>
