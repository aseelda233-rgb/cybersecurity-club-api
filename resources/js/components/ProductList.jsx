import { useEffect, useState } from 'react';

function ProductList() {
    const [products, setProducts] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        const loadProducts = async () => {
            try {
                const response = await fetch('/api/products');
                if (!response.ok) {
                    throw new Error('Unable to load products.');
                }

                const payload = await response.json();
                setProducts(Array.isArray(payload.data) ? payload.data : []);
            } catch (requestError) {
                setError(requestError.message || 'Unable to load products.');
            } finally {
                setLoading(false);
            }
        };

        loadProducts();
    }, []);

    return (
        <section className="dashboard-panel">
            <div className="panel-heading">
                <div>
                    <p className="eyebrow">Inventory</p>
                    <h2>Products</h2>
                </div>
                <span className="panel-count">{products.length}</span>
            </div>

            {loading && <p className="state-message">Loading products...</p>}
            {error && <p className="state-message state-error">{error}</p>}
            {!loading && !error && products.length === 0 && (
                <p className="state-message">No products found.</p>
            )}

            {!loading && !error && products.length > 0 && (
                <div className="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            {products.map((product) => (
                                <tr key={product.id}>
                                    <td className="strong-cell">{product.Name}</td>
                                    <td>{product.Category}</td>
                                    <td>${Number(product.Price || 0).toFixed(2)}</td>
                                    <td>{product.Stock}</td>
                                    <td>
                                        <span className={`status-pill ${product.Available ? 'status-success' : 'status-muted'}`}>
                                            {product.Available ? 'Available' : 'Unavailable'}
                                        </span>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            )}
        </section>
    );
}

export default ProductList;
