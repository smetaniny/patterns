import { Square, Piece } from 'chessops'

export type AppSquare = { num: Square, piece: Piece | undefined }
export type AppSquares = AppSquare[];