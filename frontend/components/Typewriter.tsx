"use client";
import { useEffect, useState } from "react";

export default function Typewriter({
  words,
  typeSpeed = 90,
  deleteSpeed = 45,
  pause = 1800,
  className = "",
}: {
  words: string[];
  typeSpeed?: number;
  deleteSpeed?: number;
  pause?: number;
  className?: string;
}) {
  const [i, setI] = useState(0);
  const [text, setText] = useState("");
  const [deleting, setDeleting] = useState(false);

  useEffect(() => {
    const word = words[i % words.length];

    if (!deleting && text === word) {
      const t = setTimeout(() => setDeleting(true), pause);
      return () => clearTimeout(t);
    }
    if (deleting && text === "") {
      setDeleting(false);
      setI((p) => p + 1);
      return;
    }

    const t = setTimeout(
      () =>
        setText((prev) =>
          deleting ? word.slice(0, prev.length - 1) : word.slice(0, prev.length + 1)
        ),
      deleting ? deleteSpeed : typeSpeed
    );
    return () => clearTimeout(t);
  }, [text, deleting, i, words, typeSpeed, deleteSpeed, pause]);

  return (
    <span className={className}>
      {text}
      <span className="ml-1 inline-block w-[3px] translate-y-[2px] bg-terracota animate-caret align-middle h-[0.9em]" />
    </span>
  );
}
