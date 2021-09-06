export class Pelicula {
  private _idPelicula: number
  private _nombrePelicula: string
  private _imagenPelicula: string
  private _duracionPelicula: number
  private _clasificacionPelicula: string
  private _horariosPelicula: string


  constructor() {
    this._idPelicula = 0
    this._nombrePelicula = ''
    this._imagenPelicula = ''
    this._duracionPelicula = 0;
    this._clasificacionPelicula = '';
    this._horariosPelicula = '';
  }


  get idPelicula(): number {
    return this._idPelicula;
  }

  set idPelicula(value: number) {
    this._idPelicula = value;
  }

  get nombrePelicula(): string {
    return this._nombrePelicula;
  }

  set nombrePelicula(value: string) {
    this._nombrePelicula = value;
  }

  get imagenPelicula(): string {
    return this._imagenPelicula;
  }

  set imagenPelicula(value: string) {
    this._imagenPelicula = value;
  }

  get duracionPelicula(): number {
    return this._duracionPelicula;
  }

  set duracionPelicula(value: number) {
    this._duracionPelicula = value;
  }

  get clasificacionPelicula(): string {
    return this._clasificacionPelicula;
  }

  set clasificacionPelicula(value: string) {
    this._clasificacionPelicula = value;
  }

  get horariosPelicula(): string {
    return this._horariosPelicula;
  }

  set horariosPelicula(value: string) {
    this._horariosPelicula = value;
  }
}
