import React from "react";
import { createRoot } from "react-dom/client";

function SiteApp() {
    return (
        <div>
            <h1>React funcionando! 🚀</h1>
            <p>O CostaDH agora está conversando com React.</p>
        </div>
    );
}

const element = document.getElementById("react-site");

if (element) {
    const root = createRoot(element);
    root.render(<SiteApp />);
}
