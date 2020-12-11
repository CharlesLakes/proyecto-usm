@extends('page.panel')

@section('main')
<div class="stats">
    <h2>Información General</h2>
    <div class="container">
      <div class="container-stats">
        <h3>Avance de los quiz</h3>
        <div class="progress-bar">
          <p>Matemática</p>
          <div class="w3-grey w3-round-xlarge">
            <div
              id="mat"
              class="w3-container w3-blue w3-round-xlarge"
              style="width: 80%"
            >
              8/10
            </div>
          </div>
          <p>Física</p>
          <div class="w3-grey w3-round-xlarge">
            <div
              id="fis"
              class="w3-container w3-blue w3-round-xlarge"
              style="width: 20%"
            >
              2/10
            </div>
          </div>
          <p>Química</p>
          <div class="w3-grey w3-round-xlarge">
            <div
              id="qui"
              class="w3-container w3-blue w3-round-xlarge"
              style="width: 0%"
            >
              0/10
            </div>
          </div>
        </div>
      </div>
      <div class="container-stats">
        <h3>Leaderboard</h3>
        <div class="leaderboard">
          <ul>
            <li>
              <span>1) Carlos Lagos</span>
              <span>10</span>
            </li>
            <li>
              <span>2) Carlos Lagos</span>
              <span>10</span>
            </li>
            <li>
              <span>3) Carlos Lagos</span>
              <span>10</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="contianer-videos-recomendados">
      <h2>Videos Recomendados</h2>
      <div class="continaer-video">
          <div class="card">
            <img src="https://blog.uniacc.cl/hubfs/%C2%BFPor%20que%CC%81%20es%20tan%20atractivo%20estudiar%20Ingenieri%CC%81a%20Informa%CC%81tica_%20(1).png" alt="Imagen de muestra">
            <p>Introduccion a la ingenieria</p>
            <p>Por: Senku Ishigami</p>
          </div>
          <div class="card">
            <img src="https://sites.google.com/site/sistemasalgebralineal/_/rsrc/1468912950525/unidad-2---matrices-y-determinantes/aplicaciones-de-matrices-y-determinantes/1.jpg" alt="Imagen de muestra">
            <p>Matrices</p>
            <p>Por: Senku Ishigami</p>
          </div>
          <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Riemann_Integration_3.png/400px-Riemann_Integration_3.png" alt="Imagen de muestra">
            <p>Integral de riemann</p>
            <p>Por: Vicente Muños</p>
          </div>
          <div class="card">
            <img src="https://s3-us-west-2.amazonaws.com/devcodepro/media/tutorials/diccionarios-en-python-t1.png" alt="Imagen de muestra">
            <p>Diccionarios en python</p>
            <p>Por: Kingaldo</p>
          </div>
          <div class="card">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAT0AAACfCAMAAAC85v7+AAABX1BMVEX///8ASn8AR30AQ3txiqgzXosAQHkARXwAO3cAQXqZqb7Hz9oAPXj1+PrR3eiqwNalvdrJ1+agudKKhYEAJ236/Pg4ZqMANnQjW54xYqEYVpsAM3NbfKLt8vgAToT2+fSpuMpRdZze5ezc6dOuzZvK3r7m7+GPi4ZlhLN9lr13k7Lb4um4x9esvM0AFWcmYJL//OsALnGdwnTE27Py//+qy5Y/eamLsdfB2KuRr8vP5+bl8/qaxOeBfHfs6+vV09KsqavPztK7t7W9wLZXeq6NosRBapZyka8AIGlVdJmLorve58KZv42gxYPB3tSy0c7z8MtoqVDW5MuLs299wJfT3qik1MHL5NvB28V1r0mo0KO3zozD3syOvpG/2LScxYKuyrRwqt211vHB5PbQ6vbW4K+Asd+Bq9uIwOhoqTe52PCKumldntqh1PG+0+2ln56np56CipTHycCXlJ8ASJVmwv9fAAAObUlEQVR4nO2dC3vaRhZAL5LNyxoJQXgaISxA2CAWHOwCQcGuH6SLm9bLbpo0aZ21IcQlNe5m+/+/vSNwGr9is4AN8ZyvQQgNaHJy78xII6kADAaDwWAwGAwG4yvAmJsesvctY2jcQX5aWFy4bxlD47bbpgUnszcCX5s9TnDcmbuvzh5nM5buUN/M2+MFnrPZXKiMc2HkiV4XlWi32x02h93O0RUXZxUcfM1lp4V5qwQueJuDfgPL9DdwLoxejrdZX3Jx+BFvfU5/1GF9ne6Pcwad3Ezbc+BfxmFr5BoxB9eIOrhow1V3u91zvI2zlkI9Hq9zNi7vzuNflM+4+7YbbvcSz0exxJKDn4s3HPUGinbXHXSDi4u5c1E+2rC58asx93wjKjxzN+ZwR9y8O4p7dLszdbtjXgNxnpthe3xDiznmFbIASt6h5AR7nDhzIGbdLps9jst4DETZEGyOKGAycxxAhsegiUFWBPdiFkvMuUTIKu4GODkHPOtvcGqKoeH3XcQQ+Aw4wHikkCyQukMwQAlyedA0kO3zmSUl65xhe45oziYsgCuYh7hTiVN7wZzy3SPBhvaU1UeLGcg/itkG9viMIotBy97c30RtUZT/tupsQHSRnx/Ys0EUN8Qg851DiJNFAxadsvwdkR4p3kcxJRt0khzU+Tz8fTUKDbtrFXc3w/b4JcPBK4bTJojiJ3tgGJhxGDuGsZQH0sA2qm8vKMbnADMY7XmfkfiiqBg5fkHBJk/4ZM+bIXGnBrm8E8M4CnUOMquWPQHLBKPgUnLOPET5RdxrLE7rMYw9vw6ggqr7db3/wd73Sur5D4X1dWUynq6mb8+RNyDmUDA1/7KHmStJfXu4tNcXQHT17WHGRfMYMtSeAlmnICper0vWMJft1B5P7eEGgUMtxBYndp5458C12LeHZQRDdBlEoPaCmowW54Theg098SM8Xtv/R/OVihrxT+GfCnn3rxc/vPiJblYnpesCfXuckl3iBC37yC6AEdSM1UVJWc0pq0EqBMNw0eVyPnJjuKG9uhOTFMkK1N6zPGSCovxdEEM1JgjODAgC5nMMonXICM7VJYiiPaehGbIzaNlbXBUVJ6G/gP8Efw/GIC7EcrFh+9z9l+/2dFUvFF9BoXiwBvBcgbdP3rzcQ3vrPz++I32WPa6ObZadfwZGRoN8EPOoAvHFHGk0sM/F2GvsRhu5jKbwNPaM3DPNWAxmoO5AexlM22BWyTTqeVAahjsP2UyWxFArbqiLGXRKY28JYI637InuLETn0PQiGDHIxYnCcXmNjiuHir3X6sGbXzDI9DLxJxIE9v7x6vGvzb1fHz/BDz8Uk+vJ4jUG98pKYZ28+WH/gCb93g/+4i+F4i8j2LPFFC0juVzPRM0AY55za1m3A9ey2bjd5pijy7qoLcxjb5sXxaxXxiFNLItmbdmoParF3FgCxzQL2kJdWMKCdT6GG+a0vKGJUWdG5m1OWYxxwkIjGBcXvPWgO4d9uduIidmFRsyyN2TsFbC98/tp+zdwpCMJHRJWM+hX+1uab8tN/6Xv7ovN9bUXL/deK4mUvo/e/l1cezGKPce8IcZdOFi2B+taw2UXBPyYdzqddKuDLh2CXbBGy3SFHsBxTjrcxRfeydnxQxzmWUUcToFu7m8QaFEe2zSbQL8tYCTj1+lY2hoq448JdAzePyKcRJ+rN5MoMaV/FoeFlP/geZW+e432Cr/AnjqiPay/82zY7OTHctw1PBMbsah6cb2Mi34Yvjt46d/DhjJRxiSH1Gs9mdKLT/6/X34451j82BiO+zcfjj0kebkRHI0HZU8f9w+6BW5aCM7ekVp8fmqIzV7sPSjG3u49KJi9UWD2RoHZGwUmj3FfpFjwjQBr90aB2RsFZm8UWLvHuFuUc1O8dEWGNlGIfE/1mSnI4RGpAqnKR0AXXVwxxZbnsFoi1rwoO/HyJcjvpljqmkee49KRaZimhotuWyu1pXYb1Oc/J++7glMNOYbS4VGpKx6XJNNYMz2HJ6bclkttT7uKkfehmEyWr5v7ZWBLR6oE81UhGhB8VQjRTkjV35Fb0L+MQ9VVSCXPzVsyLiGRs3e071DIuY2qnjrAQU3i3KhGhUK1/86aYZ98FacYD7mxiJ5aTzatS7Qoe6/Im1/X9n7F4EyUxcKHtQlXcKq5hb0+annd6kzWi08KT9TUT2pCh3dKqsjs3RJr5vxA/wlgv/hWT+h7r9Ti4+qkajYLDGMvQV/81qt1OaCeUO/sssDpZBh7jIsMY48dglxk6HaP8RnD2GMHcBdh9kaBZe4oDGPvYR+VXQUbsYzCMPZSk6vGjMLavVGQvRVJvKVB1udehmho0GuIN98LyOxdhyJKuxVJU74UhmVUDbQA62muAKNQ8nq9Mo1CDf/UOl3r82z/LFQLS5hiq3aoHd9fHacdItMo/EZGe4cinaU03x97Dltm58g4bJtS1fRUS+02FvzCnIc/9bKQrOopGqTNxJ1VfVqQlisK1I6JWToytV63Ix6bxDwqnaC90u8tzxoB/effUvp142d/4qDwve7fe5lKJQ4e3ilAq2UjbZB71V5X6YomEUlb7rXbchtEYk29JT4kikl6s9tVCgsH+OI/8DdTe69ePOiT9+cgVWr1r/4ZA6v8Ntm8EF+FA3p37xt6u68/eXC3NZw+iPeLm1Vs29TkQeLh5eituMGehaqn1nXQr20LHy63sddHTyWLk6zJLHJ7e+ivPLl6zCbD2Hvgk5RXMJQ9xgWGsac2J1eP2YS1e6PA7I0CszcKQ9lj0x8XYH3uKDB7ozBU5rIjtQuQyu3Lsl7jEta0W/ZWs0HM3pVoRqUiydpNM5fM3rVY025fnj9XE/T2GehPyzEuo5zNn2vUUOm4P2N5ZL3KuOJpm9XSidS+xypOOUQRpcozOnFZMsWOKXek3486Ha1T0jrHvfYJKR3VTo7o0zrL155sThTJuxSk+u4L/+/jEmeXipfaq4rHJbOlHUrd93LLoDO/7ROt19FOMH9Tv304aF53ufj+kxev/S+egNpsrvn9/77Lmk8NIpBem/SIXMVFVVN6ba1q4rrRotccYOw1y49TGISXYtBvzbbto71Uag32HvR9Mwj51JnQJk8kn/tQD8rJ5PnTzuUUnbEsv7JW9pMP75qD84g33Jmv+iHx3HLGuMxN9izURAqgmGKzHxe5lT0LNfGcReAFbm8PO2Nm7wLD2GNchNkbBZa5o8DsjQKzNwrM3igMY49dKnkR1ueOwjD22CWmF2Ht3iiI3tv/j++YvUuIUsUrydptZi6ZvStRNFmqVOSbZtSYveshmuH1np8/F7ufF9B0FXprXSL7j+66brOCJtNEzhKJBuL7riIrpC0eErlKRPRGStUjsWca7RsmNB5y70znz7+hE5fvTa1jmi3x2NPt9I5KVVxpt8BTFVtor5m89gqEF6/usrrTB6nQkUwJjOMTj6l0PKbZa3t6JtrrGsctuYUpXf5tvZy6+vCj8MDt9SGD/8jg1nK6YgLxl9q0QUzofr2Z1K2n0p2H2TuP+Ond5dv01WZx/c25O2YS45lAqqV9vqc18D31+bZg8+mWz1c79Z3CxtOPad8fUHuaxrdbsOF7iu+mGunm8WDx7XpxvEOa0/Tm1haQWm0jvYkrW6fp0620D9dON9M+qPk+orkapE9rtSl/6sIt7NELYHTwr6+P69aZGgYYQjY2NtLb4NsEHX39kYbtdA22fGhuAxc1FeNy2rmVvT7q8zHt81vUg/8kmL7pdK2W3kJXKoYgnJ4CtYfm6Fvdl978dkx7nBRD2INxXUr50Ud3iiFGTtM1GmmbNF23SRrtYfOHAi2RG2nM5jHtckIMY29cbFr2qKTNtBVpmLwosYYea5iuKLDWz9qt9I93X7thuBd76W9rmLHpWjaN6Zr2g48mL0bhx9omGvRt0YCkZ4i2vqbYG9fTm7Z8ad9T8kfad+rbpOm64fsW3E8x0nx0BLOR/k/4Pz60e4qjmPhydkw7nQjD2Hszrp1ubG9/hNr2x9r2BrHeqSuRLYxC7IRx63YgvLlNattYyAgFQivj2usEuBd7lxBDYYW2fhRFC4XPxvArgUAgvDyx3Y7MdNgzwmjvv9b4xLurnNkzQA7t7gTCuxPb76gMY29yF5RK4dBgHsGIrCihgHU6t/InwPIO2QmEpnZ68D763MvsBs7sBcIS2rMqtRNCeyEDAoGd+6zblxjG3uTO36+c2fOG0V44bHW0EZS2HF7B9A1Pa/BNR7u3giFHl1qYxl44YKmM7NLYE6nCae04JI/8xWdMfs5E7Vldw/IyDUJLGYgRCW2GsQmUQ9Nqjz6mk94weBuFE7OHPUMAGzmQIiQUGgQceCMaaCHa5GmDYJxWUKGn4r1J4cTsYT+xE/aC/Cf2GCtn9nZQnNYfK+9Mtz0LZTB//qmmSrd/b+Dg7H1VBdIVq1pVaY17z6GdhXBgGVUZIauxy1JxFczZiEG370xtp3sBRTMwkw0xg8pkU5FbIGulrtYFrdcWW8qJtObp+o+18T5CEu1B/6DCwHQFL1VoRFBhJUTtZae33bsKolW+WVZAPGxJhy2zXeoeS91StysdyifmGposVcc7SlQimLZhmqS71N6Clb4BumoNlFf6ETg7aHTEhYF3eNjudCWz1Gmf1Lqd922MvdLhmtkb712AWexe++2DlaMy2iMR+vCK3Qi+LEdm9ikggznLT7Emt4Fkj3rjzVwpdOZnx+olMIcrNAgx6rAlDElj3dlXhxQ5O5gIWKbCIegPkFfCy3+uTH9/e794I4PYFvsaV8IrVnchhQPM3Y1U/rJnnZsywv0TA5XwEM+eebB8spf901qQ0OC0SmB6T+1ND7tno2HPoPfYCfW1RVjs3Yx01qsOxnVGZDCZEZmpYfKU8OlBZczeKOywHpfBYDAYDAaDwWAwJsz/AA8F9s31akDrAAAAAElFTkSuQmCC" alt="Imagen de muestra">
            <p>Recursividad</p>
            <p>Por: CharlesLakes</p>
          </div>

      </div>
  </div>
@endsection